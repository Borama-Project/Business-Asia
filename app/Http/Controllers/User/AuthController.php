<?php

namespace App\Http\Controllers\User;

use Request;
use Session;
use App\Http\Controllers\Controller;
use App\Collection\Product;
use Validator;
use App\Model\Auth;
use Input;
use File;
class AuthController extends Controller
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
        
        $value = Session::get('zeProfile');
        if($value){
          var_dump($value);
        }
        return view('Auth.auth');
        
    }

    public function postIndex(){
        
        // Session::put('zeProfile', 'value');
        echo "dat";
        dd(Input::all());
    }


    public function getAdminProfile(){
        $html = '<div class="col-lg-12"> 
              <form action="/Auths" method="post">
                <div class="panel panel-info">
                  <div class="panel-body">
                    Products
                  </div>
                </div>
                <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">Name *</label>
                    <input type="text" class="form-control"  name="name" placeholder="Name">
                </div>
                <div class="form-group col-xs-6">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control"  name="name" placeholder="Name">
                </div>
                
                <div class="form-group col-xs-12">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
                  
              </form>
              </div>

';
        return $html;
    }
    public function postAdminProfile(){
      // dd(Input::all());
      echo "string";
    }
}