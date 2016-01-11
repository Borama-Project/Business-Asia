<?php

namespace App\Http\Controllers\Business;

use Illuminate\Support\Facades\Input;
use Request;
use App\Http\Controllers\Controller;
use Validator;
class BusinessController extends Controller
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
     return view('business.viewCategory');
    }

    public function postSave(Request $request){

        $businessId   = Input::get('businessId');
        $userId       = Input::get('userId');
        $categoryName = Input::get('categoryName');

        $data = array($businessId,$userId,$categoryName);
         return($data);

    }

    public function getCategory()
    {
        return view('business.category');
    }

    public function getBusinessType()
    {
        return view('business.businessType');
    }

    public function postSaveBusinessType()
    {
        $name = Input::get('name');
        return $name;
    }

    public function getRegisterBusiness()
    {
        return view('business.business');
    }

    public function getBusinessTag(){

        return view('business.businessTag');
    }

    
}