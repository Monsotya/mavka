<?php
class Dish {
    private $name;
    private $weight;
    private $price;
    private $image;
    
    function __constract($name, $weight, $price, $image){
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
        $this->image = $image;

    }
    
    function set_name($name) {
        $this->name = $name;
    }
    
    function get_name() {
        return $this->name;
    }
    
    function set_weight($weight) {
        $this->weight = $weight;
    }
    
    function get_weight() {
        return $this->weight;
    }
    
    function set_price($price) {
        $this->price = $price;
    }
    
    function get_price() {
        return $this->price;
    }
    
    function set_image($image) {
        $this->image = $image;
    }
    
    function get_image() {
        return $this->image;
    }
}

?>