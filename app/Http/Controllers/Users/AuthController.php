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
      $this->middleware('ZeAuth');
   }
   public function home(){

     return view('index');
     
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
        $zeSocialBusinessResult = json_decode($zeSocialBusinessResult);
        $zeAccessKey = array(
            'AccessKey'    => $zeSocialBusinessResult->data->accessKey,
            'ownerId'  => $zeSocialBusinessResult->data->userId,
        );
        
        Session::put('zeAccessKey',json_encode($zeAccessKey));
        return json_encode($zeAccessKey);

    }

    
    public function getInfo(){
      return view('form');

    }
    

    public function getAdminProfile(){
      if (Session::has('zeAccessKey'))
      {
          $html="";
      }else{
        
        if (Session::has('zelog')){
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
        }else{
          $html = '<div class="container">
                <div id="contentCenter" ng-controller="ngAuth">
                  <div class="col-lg-12 pad-top-20 thumbnail"> 
                    <form ng-submit="submit()">
                      <div class="form-group col-xs-12">
                        <label class="control-label col-lg-4 pad-top-5">User Name :</label>
                        <div class="col-lg-8 pd-lef-0">
                          <input type="text" class="form-control" ng-model="app.name" placeholder="User Name" required >
                        </div>
                      </div>
                      <div class="form-group col-xs-12">
                          <label class="control-label col-lg-4 pad-top-5">Password :</label>
                          <div class="col-lg-8 pd-lef-0">
                            <input type="Password" class="form-control" ng-model="app.Password" placeholder="xxxxxx" required >

                          </div>
                      </div>
                      <?php

                        $value = Session::get("zeAccessKey");
                              

                        if (Session::has("zeAccessKey"))
                        { 
                          $value = json_decode($value) ;
                          
                          var_dump ($value);
                        }
                        ?>
                      <div class="form-group col-xs-12">
                          <div class="col-lg-12 aling-r">
                            <button type="submit" class="btn btn-default">Login</button>
                          </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>';
        }
      }
      
        return $html;
        
    }

    public function postLogin(){
      $dataRequest = Input::All();
      if(Input::get('name') == 'ZeAdmin' && Input::get('Password')== 'ze8899!@'){
        Session::put('zelog',json_encode($dataRequest));
        return('{"code": 1,"data": [{}],"message": {"code": 1,"description": "Success"}}');
      }else{
        return('{"code": 0,"data": [{}],"message": {"code": 1,"description": "User and Password is incorrect..!"}}');
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
}