<?php

namespace App\Models;
use App\Collection\Product;
class ProductModel
{

    public function __construct()
    {

    }

    public function getIndex(){
        $products = Product::all();
        return $products;
    }

}
?>