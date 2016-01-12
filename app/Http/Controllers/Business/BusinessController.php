<?php

namespace App\Http\Controllers\Business;

use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\ZeSocialBusinessModel;
class BusinessController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getIndex()
    {
        return view('business.viewCategory');
    }

    public function getList(){

        $method = 'category/get_all_categories';
        $dataRequest = '';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($method,$dataRequest);
        return ($zeSocialBusinessResult);
    }

    public function postSaveCategory(Request $request){

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
