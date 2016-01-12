<?php

namespace App\Http\Controllers\User;

// use Request;
// use App\Http\Controllers\Controller;
// use App\Collection\Product;
// use Validator;
use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        // $users = DB::collection('product')->get();
        // $users = Product::all()->$_id;
        $users = Product::find('56834a407f8b9ab6775da7d6');
        dd($users['id']);
        //return view('index');
    }

    public function postIndex(Request $Request){
        // dd(Input::all());
        
    }


    public function getauthUser(Request $Request){
      $request->session()->put('zeProfile', 'sothearit');
      $sessionAuth = session('key');
      var_dump($sessionAuth);
    }
    public function postProfile(Request $request)
    {
        $value = $request->session()->flush('key');
        return $request;
        //
    }
    public function getProfile(Request $request)
    {
        $value = $request->session()->flush('key');
        return $request;
        //
    }

}