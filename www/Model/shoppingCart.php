<?php

class ShoppingCart{
    public $elements = [];

    public function __construct(){

        
    }

    public function addProduct($product){
        $this->totalElements =0;
        $this->totalPrice = 0;
        $this->elements[]= $product;//new ShoppingElement($product);
    }
    public function deleteProduct($prod){

    }

    public static function clearShoppingCart(){
        $this->elements = [];
        Url::redirect('/carrito.php');
    }
}

