<?php

namespace App\Http\Controllers\User;
use Session;
use Request;
use App\Http\Controllers\Controller;
use App\Collection\Product;
use Validator;
class FormController extends Controller
{

    public function __construct()
    {
       //parent::__construct();
        $this->middleware('guest');
    }

	public function getIndex()
    {
        
        
        Session::put('zeAccessKey', 'value');
        $value = Session::get('zeAccessKey');
        var_dump($value);
    }

    public function getUs(){

        $dataRequest = array(
            'socialId'    => '2222',
            'socialType'  => 1,
            'firstName'   => 'first name',
            'lastName'    => 'sothearit',
            'avatar'      => '',
            'displayName' => 'user',
        );
        // Session::put('zeAccessKey', $dataRequest);
        return view('jsonView');
    }

    public function postIndex(Request $Request){
        
        // Session::put('zeProfile', 'value');
        echo "dat";
        // dd(Input::all());
    }
    
}