<?php

namespace App\Http\Controllers\User;



use App\Collection\Product;
use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\ZeSocialBusinessModel;
use Session;
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
      // dd(Session::all());
        
        $value = Session::get('zeAccessKey');
        // if($value){
        //   var_dump($value);
        // }
      if (Session::has('zeAccessKey'))
      {
          var_dump($value);
      }else{
        
        return view('Auth.auth');
      }
        
    }

    public function postIndex(){
        
        // Session::put('zeProfile', 'value');
     
        // dd(Input::all());
         
        $method = 'profile/login';

        // $dataRequest = array('socialId'=>Input::get('socialId'),'socialType'=>1,'firstName'=>Input::get('firstName'),
        //   'lastName'=>Input::get('lastName'),
        //   'avatar'=> Input::get('avatar'),
        //   'displayName'=>Input::get('displayName'));

        $dataRequest = array(
            'socialId'    => Input::get('socialId'),
            'socialType'  => 1,
            'firstName'   => Input::get('firstName'),
            'lastName'    => Input::get('lastName'),
            'avatar'      => Input::get('avatar'),
            'displayName' => Input::get('avatar'),
        );
        
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;

        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($method,$dataRequest);
        // var_dump($zeProfile);
        
        Session::put('zeAccessKey', $zeSocialBusinessResult);
        return view('jsonView',['datas' => $zeSocialBusinessResult]);

    }

    public function getAdminProfile(){
      // if (Session::has('zeAccessKey'))
      // {
          
          $html = '<div class="container" >
                <div id="contentCenter">
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
      // }else{
      //   $html='';
      // }
      
        return $html;
        
    }
    public function postAdminProfile(){
      // dd(Input::all());
      echo "string";
    }
}