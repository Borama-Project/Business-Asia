<?php namespace App\Http\Controllers\BackEnd\Product;


use App\Http\Controllers\Controller;
use App\Models\ProductModel;

class ProductController extends Controller
{

    public $viewFolder = "back-end.product";

    public function __construct()
    {
        $this->Models = new ProductModel();
    }

    public function getIndex()
    {
        return $this->Models->getIndex();
        //return view($this->viewFolder . '.index')->with($this->data);
    }

}
