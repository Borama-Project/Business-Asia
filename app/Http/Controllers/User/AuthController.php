<?php

namespace App\Http\Controllers\User;
use Closure;
use Validator;
use App\Collection\Product;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Session;

// use Request;
use Illuminate\Http\Request;
use Session;
// use Illuminate\Session\Middleware\StartSession;
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
          var_dump($value);
          return view('Auth.auth');
      }
      else{
          return view('Auth.auths');
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

        // $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($method,$dataRequest,'post');
        // var_dump($zeProfile);
        // $request->session()->put('zeAccessKey', $zeSocialBusinessResult);
        // Session::put('zeAccessKey', $zeSocialBusinessResult);
        // $data = $request->session()->all();
        // return view('jsonView',['datas' => $zeSocialBusinessResult]);
        return json_encode($dataRequest);

    }

    public function getAdminProfile(){
      // if (Session::has('zeAccessKey'))
      // {
          
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
      // }else{
      //   $html='';
      // }
      
        return $html;
        
    }
    public function getAdminSess(){
      return view('session');
    }
    public function postAdminSess(Request $request){
      // dd(Input::all());

      // $value = $request->session()->pull('key', 'default');
      Session::put('zeAccessKey', Input::all());
      // $request->session() = 'data';
      dd($request);
      // return 'data';
    }

    public function postProfile(Request $request)
    {
        $value = $request->session()->flush('key');
        return $request;
        //
    }
    public function getProfile(Request $request,Session $Session)
    {
        // $value = $request->session()->flush('key');

      Session::put('zeAccessKey','sothearit');
      $value = Session::get('zeAccessKey');
        var_dump($value);
        dd($request);
        //
    }
}