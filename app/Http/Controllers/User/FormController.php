<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\Collection\Product;
use Validator;
class FormController extends Controller
{
	public function getIndex()
    {
        
        $value = Session::get('zeProfile');
        if($value){
          var_dump($value);
        }
        return view('Auth.auth');
        
    }

    public function postIndex(Request $Request){
        
        // Session::put('zeProfile', 'value');
        echo "dat";
        dd(Input::all());
    }
}