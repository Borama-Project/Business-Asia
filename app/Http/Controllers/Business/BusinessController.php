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

        $function = 'category/get_all_categories';
        $dataRequest = '';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest);
        return ($zeSocialBusinessResult);
    }

    public function postSaveCategory( ){

        $businessId   = Input::get('businessId');
        $userId       = Input::get('userId');
        $categoryName = Input::get('categoryName');

        $function = 'business/add_category';
        $method = 'POST';
        $dataRequest = array(

            'accessKey'=>'NTY5MzY4YWE3ZjhiOWE0YjBkNDllZjMxMjAxNi0wMS0xMSAwODozMjo0MlNvY2lhbEJ1c2luZXNz',
            'categoryName' => Input::get('categoryName'),
            'businessId'   =>Input::get('businessId')

        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);


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

    public function getBusiness()
    {
        return view('business.business');
    }

    public function postRegisterBusiness()
    {
        $function = 'business/register_business';
        $dataRequest = array(
            'accessKey' => Session::get('zeAccessKey'),
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'phoneNumber' => Input::get('phoneNumber'),
            'address' => Input::get('address'),
            'email' => Input::get('email'),
            'businessTag' => array(Input::get('businessTag')),
            'businessType' => array([Input::get('businessType')]),
        );
        $method = 'POST';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return($zeSocialBusinessResult);
    }


    public function getBusinessTag(){

        return view('business.businessTag');
    }

    public function getListBusinessTag(){

        $function = 'businessTag/get_all_business_tags';
        $dataRequest = '';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest);
        return ($zeSocialBusinessResult);
    }

    public function getListBusinessType(){

        $function = 'category/get_business_category';
        $dataRequest = '';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest);
        return ($zeSocialBusinessResult);
    }

}
