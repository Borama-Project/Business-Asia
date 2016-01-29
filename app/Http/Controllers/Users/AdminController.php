<?php

namespace App\Http\Controllers\Users;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\ZeSocialBusinessModel;
class AdminController extends Controller
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
      $this->middleware('AdminZeAuth');
   }
   public function home(){

     return view('index');
     
   }

  public function postLogin(){
    $function = 'adminUser/admin_log';
      $method   = 'POST';
      $dataRequest = array(
          'userName'          => Input::get('name'),
          'password'          => Input::get('Password'),
      );
      $ZeSocialBusinessModel = new ZeSocialBusinessModel;
      $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
      $zeSocialBusinessResult = json_decode($zeSocialBusinessResult);
      $zeAccessKey = array(
          'AccessKey'    => $zeSocialBusinessResult->data->accessKey,
          'ownerId'  => $zeSocialBusinessResult->data->userId,
      );
      Session::put('zeAdmin',json_encode($zeAccessKey));
      // return ($zeSocialBusinessResult);
      return json_encode($zeSocialBusinessResult);
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