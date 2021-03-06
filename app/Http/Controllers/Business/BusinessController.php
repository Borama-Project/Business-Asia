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
    public function getListProductCategory(){

        $function = 'category/get_product_category';
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
    public function getCategory()
    {
        return view('business.viewCategory');
    }
    public function getEditCategory()
    {
        return view('business.EditCategory');
    }

    public function getAddCategory()
    {
        return view('business.addCategory');
    }
    public function postEditCategory()
    {
        $function = 'businessAdmin/update_category';
        $method = 'POST';
        $accessKey = json_decode(Session::get('zeAccessKey'));
        $dataRequest = array(

            'accessKey'=> $accessKey->AccessKey,
            'newCategoryName' => Input::get('categoryName'),
            'businessId'   => Input::get('businessId'),
            'categoryId'   => Input::get('categoryId')

        );
//        return $dataRequest;
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
    }

    public function postGetCategoryById()
    {
        $function = 'businessAdmin/get_category_by_id';
        $method = 'POST';
        $dataRequest = array(
            'businessId'   => Input::get('businessId'),
            'categoryId'   => Input::get('categoryId')

        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
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
    public function postDeleteCategory(){

        $method   = 'POST';
        $function = 'businessAdmin/remove_category';
        $dataRequest = array(
            'businessId'      => Input::get('businessId'),
            'categoryId'      => Input::get('categoryId')
        );
//        return $dataRequest;
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
    }
    public function postGetCategoryByBusiness(){

        $method   = 'POST';
        $function = 'businessAdmin/get_category_by_business';
        $dataRequest = array(
            'businessId'      => Input::get('businessId')
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
    }

    public function postGetBusinessById(){

        $method   = 'POST';
        $function = 'businessAdmin/get_business_by_id';
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
    public function postRegisterBusinessFuc()
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

        $businessTagList     = array(Input::get('businessTagList'));
        $businessTypeList     = array(Input::get('businessTypeList'));
//return $businessTagList;
        $strNullType = '';
        foreach($businessTypeList as $value){
             $strNullType .= "[".$value."]";
        }

        //  business tag list foreach string
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
        if($file == null && $cover==null){
            $dataRequest = array(
                'authorId'          => $authorId->ownerId,
                'locationname'      => Input::get('locationname'),
                'businessname'      => Input::get('businessname'),
                'description'       => Input::get('description'),
                'phoneNumber'       => Input::get('phoneNumber'),
                'address'           => Input::get('address'),
                'email'             => Input::get('email'),
                'latitute'          => Input::get('latitute'),
                'longitute'         => Input::get('longitute'),
                'businessTagList'   => $str,
                'businessTypeList'  => $strNullType
            );
        }else {
            $dataRequest = array(
                'authorId' => $authorId->ownerId,
                'locationname' => Input::get('locationname'),
                'businessname' => Input::get('businessname'),
                'description' => Input::get('description'),
                'phoneNumber' => Input::get('phoneNumber'),
                'address' => Input::get('address'),
                'email' => Input::get('email'),
                'latitute' => Input::get('latitute'),
                'longitute' => Input::get('longitute'),
                'logo' => new \CurlFile($fileData, 'image/jpg', $fileName),
                'cover' => new \CurlFile($coverData, 'image/jpg', $coverName),
                'businessTagList' => $str,
                'businessTypeList' => $strNullType
            );
        }
//        return ($dataRequest);
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
         return ( $zeSocialBusinessResult);

    }

    public function getBusinessTag(){

        return view('business.businessTag');
    }

    public function getListBusinessTag(){

        $function = 'businessTag/get_all_business_tags_for_admin';
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

    public function getListAllBusinessData($limit=15,$offset=0){

        $authorId = json_decode(Session::get('zeAccessKey'));
        $function = 'businessAdmin/get_all_business';
        $dataRequest =  array(
            'limit' => $limit,
            'offset' => $offset,
        );
        $method = 'POST';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return $zeSocialBusinessResult;

    }

    public function postSearchBusiness($limit=15,$offset=0){

        $zeAccessKey = Session::get('zeAccessKey');
        $function = 'businessAdmin/search_business_admin';

        if (Session::has('zeAccessKey'))
        {
            $zeAccessKey = json_decode($zeAccessKey) ;
            $data = Input::all();
            foreach (Input::all()as $key => $value) {
                $dataRequest[$key]= $value;
            }

            // $dataRequest['accessKey'] = $zeAccessKey->AccessKey;
        }
        $method = 'POST';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return $zeSocialBusinessResult;
    }

    public function getEditBusiness(){
        return view('business.editBusiness');
    }

    public function postEditBusinessFuc(){

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
        $functionLocation = 'businessAdmin/update_geo_location';
        $functionBusiness = 'businessAdmin/update_business';
        $functionUpdateLogo = 'businessAdmin/update_logo';
        $functionRemoveCover = 'businessAdmin/remove_cover_image';
        $functionAddCover = 'businessAdmin/add_cover_image';

        $businessTagList     = array(Input::get('businessTagList'));
        //return $businessTagList;
        $businessTypeList     = (Input::get('businessTypeList'));
        $businessTypeListArray = '[{"id":"'.$businessTypeList['id'].'","name":"'.$businessTypeList['name'].'"}]';

        //  business tag list foreach string
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

        $dataLocation = array(

                'businessId' => Input::get('businessId'),
                'name' => Input::get('locationname'),
                'phoneNumber' => Input::get('phoneNumber'),
                'address' => Input::get('address'),
                'email' => Input::get('email'),
                'latitude' => Input::get('latitute'),
                'longitude' => Input::get('longitute'),

        );

        if($businessTagList == [""]){
            $dataBusiness = array(
                'businessId' => Input::get('businessId'),
                'name' => Input::get('businessname'),
                'description' => Input::get('description'),
                'bussinessType' => $businessTypeListArray
            );
        }else{
            $dataBusiness = array(
                'businessId' => Input::get('businessId'),
                'name' => Input::get('businessname'),
                'description' => Input::get('description'),
                'listBusinessTag' => $str,
                'bussinessType' => $businessTypeListArray
            );
        }



//        return $dataBusiness;
        if($file == null){
            $dataLogo= array(

            );
        }else{
            $dataLogo= array(
                'businessId' => Input::get('businessId'),
                'image' => new \CurlFile($fileData, 'image/jpg', $fileName),
            );
        }

        if($cover != null){

            $dataCover= array(
                'businessId' => Input::get('businessId'),
                'image' => new \CurlFile($coverData, 'image/jpg', $coverName),
            );

            $dataRemoveCover = array(
                'businessId' => Input::get('businessId'),
                'url' => Input::get('oldCover'),
            );
        }

        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($functionLocation,$dataLocation,$method);
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($functionBusiness,$dataBusiness,$method);
        if($file != null){
            $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($functionUpdateLogo,$dataLogo,$method);
        }
        if($cover != null){
            $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($functionAddCover,$dataCover,$method);
            $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($functionRemoveCover,$dataRemoveCover,$method);
        }

        return ( $zeSocialBusinessResult);
    }
}
