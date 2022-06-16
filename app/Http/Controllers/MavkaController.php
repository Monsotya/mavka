<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use DB;

class MavkaController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    
    public function menu(Request $request, $parameter){ 
        session_start();
        if ($parameter == "all"){
            $list = Item::paginate(12);
        }
        else if ($parameter == "meat+dishes"){
            $list = Item::where(function ($query) {
                 $query->select('name')
                     ->from('tags')
                     ->whereColumn('items.tag_id', 'tags.id')
                     ->limit(1);
             }, "meat dishes")->paginate(12);
        }
        else {
            $list = Item::where(function ($query) {
                 $query->select('name')
                     ->from('tags')
                     ->whereColumn('items.tag_id', 'tags.id')
                     ->limit(1);
             }, $parameter)->paginate(12);
        }
        
        $ingredient = $request->ingredient;
        
        if (!is_null($ingredient)){
            $list = Item::select('id', 'name','weight','price','image')
            ->whereIn('id', function($query) use ($ingredient){
                $query->select('item_id')
                    ->from('ingredient_item')
                    ->where('ingredient_id', function($query) use ($ingredient){
                        $query->select('id')
                            ->from('ingredients')
                            ->where('name', $ingredient);
                        });
                })
            ->paginate(12);
        }
        
        return view('pages.menu')->with('list', $list);
    }
    
    public function item($id){
        $item = DB::table('items')->select('id', 'name','weight','price','image', 'tag_id')->where('id', $id)->first();
        
        $tag = DB::table('tags')->select('name')->where('id', $item->tag_id)->first();
        $tag = $tag->name;
        
        $ingredients = DB::table('ingredients')
            ->select('name')
            ->whereIn('id', function($query) use ($item){
                $query->select('ingredient_id')
                    ->from('ingredient_item')
                    ->where('item_id', $item->id);
                })
            ->get();
        
        return view('pages.item')->with(compact('item', 'tag', 'ingredients'));
    }
    
    public function remove_item(Request $request, $id){
        session_start();
        unset($_SESSION['cart'][$id]);
        return redirect()->action([MavkaController::class, 'cart']);
    }
    
    public function reduce_item(Request $request, $id){
        session_start();
        if($_SESSION['cart'][$id] > 1){
            $_SESSION['cart'][$id] -= 1;
        }
        return redirect()->action([MavkaController::class, 'cart']);
    }
    
    public function increase_item(Request $request, $id){
        session_start();
        if($_SESSION['cart'][$id] < 20){
            $_SESSION['cart'][$id] += 1;
        }
        return redirect()->action([MavkaController::class, 'cart']);
    }
    
    public function about(){
        return view('pages.about');
    }
    
    public function cart(){
        session_start();
        $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $products = array();
        $subtotal = 0.00;
        if ($products_in_cart) {
            $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
            $products = DB::table('items')->whereRaw('id IN (' . $array_to_question_marks . ')', [array_keys($products_in_cart)])->get();
            foreach ($products as $product) {
                $subtotal += (float)$product->price * (int)$products_in_cart[(int)$product->id];
            }
        }
        return view('pages.cart')->with(compact('products', 'subtotal', 'products_in_cart'));
    }
    
    public function add_cart(Request $request){
        session_start();
        if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
            $product_id = (int)$_POST['product_id'];
            $quantity = (int)$_POST['quantity'];
            //$product = DB::table('items')->select('id', 'name','weight','price','image', 'tag_id')->where('id', $product_id);
            if ($quantity > 0) {
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    if (array_key_exists($product_id, $_SESSION['cart'])) {
                        $_SESSION['cart'][$product_id] += $quantity;
                    } else {
                        $_SESSION['cart'][$product_id] = $quantity;
                    }
                } else {
                    $_SESSION['cart'] = array($product_id => $quantity);
                }
                //$products = DB::table('items')->whereRaw('id IN (' . implode(',', array_keys($_SESSION['cart'])) . " " . implode(',', $_SESSION['cart']) . ')', [$product_id])->get();
            }
        }
        return redirect()->action([MavkaController::class, 'menu'],['parameter' => 'all']);
    }
    
    
    public function delivery(){
        return view('pages.delivery');
    }
    
    public function order_table(){
        return view('pages.order_table');
    }
    
    public function order_delivery(){
        session_start();
        $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $products = array();
        $subtotal = 0.00;
        if ($products_in_cart) {
            $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
            $products = DB::table('items')->whereRaw('id IN (' . $array_to_question_marks . ')', [array_keys($products_in_cart)])->get();
            foreach ($products as $product) {
                $subtotal += (float)$product->price * (int)$products_in_cart[(int)$product->id];
            }
        }
        return view('pages.order_delivery')->with(compact('products', 'subtotal', 'products_in_cart'));
    }
    
    public function order_form(Request $request){
        if(isset($request['name'], $request['people'], $request['date'], $request['phone'])){
            $name = $request['name'];
            $people = $request['people'];
            $date = $request['date'];
            $phone = $request['phone'];
            if(empty($name) or empty($people) or empty($date) or empty($phone)){
                $error = 'All fields are required!';
                return view('pages.order_table')->with('error', $error);
            }
            else{
                return view('pages.index');
            }
        
        }
        return view('pages.order_table');
    }
    
    public function confirm_order(Request $request){
        unset($_SESSION['cart']);
        if(isset($request['name'], $request['people'], $request['phone'])){
            $name = $request['name'];
            $people = $request['people'];
            $date = $request['date'];
            $phone = $request['phone'];
            if(empty($name) or empty($people) or empty($phone)){
                session_start();
                $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                $products = array();
                $subtotal = 0.00;
                if ($products_in_cart) {
                    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
                    $products = DB::table('items')->whereRaw('id IN (' . $array_to_question_marks . ')', [array_keys($products_in_cart)])->get();
                    foreach ($products as $product) {
                        $subtotal += (float)$product->price * (int)$products_in_cart[(int)$product->id];
                    }
                }
                $error = 'All fields are required!';
                return view('pages.order_delivery')->with(compact('products', 'subtotal', 'products_in_cart', 'error'));
            }
            else{
                unset($_SESSION['cart']);
                return view('pages.index');
            }
        
        }
        session_start();
        $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $products = array();
        $subtotal = 0.00;
        if ($products_in_cart) {
            $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
            $products = DB::table('items')->whereRaw('id IN (' . $array_to_question_marks . ')', [array_keys($products_in_cart)])->get();
            foreach ($products as $product) {
                $subtotal += (float)$product->price * (int)$products_in_cart[(int)$product->id];
            }
        }
        return view('pages.order_delivery')->with(compact('products', 'subtotal', 'products_in_cart'));
    }
}
