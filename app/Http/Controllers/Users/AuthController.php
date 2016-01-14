<?php

namespace App\Http\Controllers\Users;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\ZeSocialBusinessModel;
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
      if (Session::has('zeAccessKey'))
      {
          // return view('index');
          return Redirect::to('/');
      }
      else{
          
          return view('Auth.auth');
      }
        
    }
    public function getLogOut(){

      $value = Session::get('zeAccessKey');
      if (Session::has('zeAccessKey'))
      { 
        Session::flush();

      }
      return Redirect::to('/Auth');
    }
    public function getInfo(){
      return view('form');

    }
    public function postIndex(){
        $method = 'profile/login';

        
        $dataRequest = array(
            'socialId'    => Input::get('socialId'),
            'socialType'  => 1,
            'firstName'   => Input::get('firstName'),
            'lastName'    => Input::get('lastName'),
            'avatar'      => Input::get('avatar'),
            'displayName' => Input::get('displayName'),
        );
        
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;

        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($method,$dataRequest,'post');

        Session::put('zeAccessKey',json_decode($zeSocialBusinessResult)->data->accessKey);
        return json_decode($zeSocialBusinessResult)->data->accessKey;

    }

    public function getAdminProfile(){
      if (Session::has('zeAccessKey'))
      {
          $html="";
      }else{
        $html = '<div class="container" >
                <div id="contentCenter" ng-controller="ngApp">
                  <div class="col-lg-12"> 
                    <form>
                      <div class="form-group col-xs-12">
                          <img src="../assets/img/logo.png">
                      </div>
                      <div class="form-group col-xs-12">
                          <img src="../assets/img/f.png" data-ng-click="IntentLogin()" id="fbLogin">
                      </div>
                    </form>
                  </div>
                </div>
              </div>';
      }
      
        return $html;
        
    }
}