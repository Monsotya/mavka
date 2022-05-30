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
        if ($parameter == "all"){
            $list = DB::table('items')->select('id', 'name','weight','price','image')->get();
        }
        else if ($parameter == "meat+dishes"){
            $list = DB::table('items')->select('id', 'name','weight','price','image')->where(function ($query) {
                 $query->select('name')
                     ->from('tags')
                     ->whereColumn('items.tag_id', 'tags.id')
                     ->limit(1);
             }, 'meat dishes')->get();
        }
        else {
            $list = DB::table('items')
                ->select('id', 'name','weight','price','image')
                ->where(function ($query) {
                 $query->select('name')
                     ->from('tags')
                     ->whereColumn('items.tag_id', 'tags.id')
                     ->limit(1);
             }, $parameter)->get();
        }
        
        $ingredient = $request->ingredient;
        
        if (!is_null($ingredient)){
            $list = DB::table('items')
            ->select('id', 'name','weight','price','image')
            ->whereIn('id', function($query) use ($ingredient){
                $query->select('item_id')
                    ->from('ingredient_item')
                    ->where('ingredient_id', function($query) use ($ingredient){
                        $query->select('id')
                            ->from('ingredients')
                            ->where('name', $ingredient);
                        });
                })
            ->get();
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
    
    public function about(){
        return view('pages.about');
    }
    
    public function order(){
        return view('pages.order');
    }
    
    public function order_form(Request $request){
        if(isset($request['name'], $request['people'], $request['date'], $request['phone'])){
            $name = $request['name'];
            $people = $request['people'];
            $date = $request['date'];
            $phone = $request['phone'];
            if(empty($name) or empty($people) or empty($date) or empty($phone)){
                $error = 'All fields are required!';
                return view('pages.order')->with('error', $error);
            }
            else{
                return view('pages.index');
            }
        
        }
        return view('pages.order');
    }
}
