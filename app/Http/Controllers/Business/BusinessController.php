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
        $this->middleware('ZeAuth');
    }

    public function getIndex()
    {
        return view('business.index');
    }

    public function getList(){

        $function = 'category/get_all_categories';
        $dataRequest = '';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest);
        return ($zeSocialBusinessResult);
    }

    public function postSaveCategory( ){

        $function = 'businessAdmin/add_category';
        $method = 'POST';
        $accessKey = json_decode(Session::get('zeAccessKey'));
        $dataRequest = array(

            'accessKey'=> $accessKey->AccessKey,
            'categoryName' => Input::get('categoryName'),
            'businessId'   => Input::get('businessId')

        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);

    }
    public function getAddCategory()
    {
        return view('business.addCategory');
    }

    public function getCategory()
    {
        return view('business.viewCategory');
    }

    public function postCategory(){
        
        $method   = 'POST';
        $function = 'businessAdmin/get_category_by_business';
        $dataRequest = array(
            'businessId'      => Input::get('businessId')
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        // return(Input::get('businessId'));
        return ($zeSocialBusinessResult);
    }
    public function postGetBusinessById(){

        $method   = 'POST';
        $function = 'businessAdmin/get_category_by_business';
        $dataRequest = array(
            'businessId'      => Input::get('businessId')
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
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
    public function getBusinessById()
    {
        return view('business.viewBusiness');

    }

    public function postBusinessById()
    {
        $method   = 'POST';
        $function = 'businessAdmin/get_business_by_id';
        $authorId = json_decode(Session::get('zeAccessKey'));
        $dataRequest = array(
            'businessId'      => Input::get('businessId'),
            'accessKey'       => $authorId->AccessKey,
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return( $zeSocialBusinessResult);

    }
    public function postDeleteBusinessById(){
        $method   = 'POST';
        $function = 'businessAdmin/delete_business';
        // $authorId = json_decode(Session::get('zeAccessKey'));
        $dataRequest = array(
            'businessId'      => Input::get('businessId'),
            // 'accessKey'       => $authorId->AccessKey,
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return( $zeSocialBusinessResult);
    }

    public function getRegisterBusiness()
    {
        return view('business.business');
    }
    public function postRegisterBusiness()
    {
        $file           =       Input::file('logo');
        $cover          =       Input::file('cover');
        if ($file != null) {
            $fileName   =       $file->getClientOriginalName();
            $fileData   =       $file->getPathName();
        }
        if($cover != null){
            $coverName  = $cover->getClientOriginalName();
            $coverData  = $cover->getPathName();
        }
        $function = 'businessAdmin/register_business';
        $authorId = json_decode(Session::get('zeAccessKey'));

        $businessTagList     = (Input::get('businessTagList'));
        $businessTypeList     = array(Input::get('businessTypeList'));

        $strNullType = '';
        foreach($businessTypeList as $value){
            $strNullType .= "[".$value."]";
        }

//        business tag list foreach string
        $strTag = '';
        foreach($businessTagList as $key){
            if($strTag==''){
                $strTag .='"'.$key.'"';
            }else{
                $strTag .=',"'.$key.'"';
            }
        }
        $str = '['.$strTag.']';
//end
        $method   = 'POST';
        $dataRequest = array(
            'authorId'          => $authorId->ownerId,
            'name'              => Input::get('name'),
            'description'       => Input::get('description'),
            'phoneNumber'       => Input::get('phoneNumber'),
            'address'           => Input::get('address'),
            'email'             => Input::get('email'),
            'latitute'          => Input::get('latitute'),
            'longitute'         => Input::get('longitute'),
            'logo'              => new \CurlFile($fileData,'image/jpg', $fileName),
            'cover'             => new \CurlFile($coverData,'image/jpg',$coverName),
            'businessTagList'   => $str,
            'businessTypeList'  => $strNullType
        );

//        return ($dataRequest);
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return( $zeSocialBusinessResult);

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

    public function getListAllBusiness(){
        return view('business.listAllBusiness');
    }

    public function getListAllBusinessData(){

        $authorId = json_decode(Session::get('zeAccessKey'));
        $function = 'business/get_all_business';
        $dataRequest =  array(
            'accessKey' => $authorId->AccessKey,
        );
        $method = 'POST';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
    }

    public function postSearchBusiness(){

        $zeAccessKey = Session::get('zeAccessKey');
        $function = 'search/search';         

        if (Session::has('zeAccessKey'))
        {   
            $zeAccessKey = json_decode($zeAccessKey) ;
            $data = Input::all();
            foreach (Input::all()as $key => $value) {
                $dataRequest[$key]= $value;
            }

            $dataRequest['accessKey'] = $zeAccessKey->AccessKey;
        }
        $method = 'POST';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return $zeSocialBusinessResult;
    }
}
