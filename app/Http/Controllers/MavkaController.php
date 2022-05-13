<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class MavkaController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    
    public function menu(){
        $json = file_get_contents('data.json');
        $data = json_decode($json,true);
        $list = array();
        foreach ($data as $value) {
            $dish = new Dish();
            $dish->set_name($value["name"]);
            $dish->set_price($value["price"]);
            $dish->set_weight($value["weight"]);
            $dish->set_image($value["image"]);
            
            array_push($list, $dish);
        }
        return view('pages.menu')->with('list', $list);
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
