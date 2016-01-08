<?php

namespace App\Http\Controllers\Product;

use Request;
use App\Http\Controllers\Controller;
use Validator;
class ProductController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('guest');
    }

    public function getIndex()
    {

        return view('product.product');
    }

    public function postIndex(){


    }


}