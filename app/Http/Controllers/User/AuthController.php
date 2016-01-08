<?php

namespace App\Http\Controllers\User;

use Request;
use Session;
use App\Http\Controllers\Controller;
use App\Collection\Product;
use Validator;
use App\Model\Auth;
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

    public function postIndex(Request $Request){
        // dd(Input::all());
        Session::put('zeProfile', 'value');
    }


    public function getAdminProfile(){
        $html = '<div class="container">
                <div id="contentCenter">
                  <div class="col-lg-12"> 
                    <form>
                      <div class="form-group col-xs-6">
                          <label for="exampleInputEmail1">Name *</label>
                          <input type="text" class="form-control"  name="name" placeholder="Name">
                      </div>
                      <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default">Submit</button>
                      </div>
                        
                    </form>
                  </div>
                </div>
              </div>';
        return $html;
    }
}