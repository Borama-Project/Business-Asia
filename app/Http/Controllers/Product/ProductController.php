<?php

namespace App\Http\Controllers\Product;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\ZeSocialBusinessModel;
class ProductController extends Controller
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

    public function getIndex()
    {

        return view('product.index');
    }

    public function postSaveProduct(){

//        $data = json_decode(file_get_contents("data.json"));
//        dd($data);
//        $businessId   = Input::get('businessId');

    }
    public function getList(){

        $method = 'POST';
        $function = 'product/get_product';
        if(Input::get('productId')){
            $dataRequest = array(
                'productId'    => 'NTY4ZjgzMjE3ZjhiOWFjZjA5OGI0NTc1MjAxNi0wMS0wOCAwOTozNjozM1NvY2lhbEJ1c2luZXNz',
            );
        }else{
            $dataRequest = array(
                'accessKey'    => 'NTY4ZjgzMjE3ZjhiOWFjZjA5OGI0NTc1MjAxNi0wMS0wOCAwOTozNjozM1NvY2lhbEJ1c2luZXNz',
            );
        }
        
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
    }

    public function postListProduct(){
        $method = 'POST';
        $function = 'product/get_product';
        $res = Input::All();
        var_dump($res);
    }
    public function getProductCondition(){
        
        $function = 'product/get_product_condition';
        $dataRequest = '';
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest);
        return ($zeSocialBusinessResult);
    }
    public function getProduct(){
        return view('product.product');
    }
    public function postProduct(){
        $function = 'productAdmin/add_product';
        $method = 'POST';
        $dataRequest = array(

            'name'=> Input::get('name'),
            'productCategoryId' => Input::get('productCategoryId'),
            'currency'   => Input::get('currency'),
            'dateStart'   => Input::get('DateStart'),
            'dateEnd'   => Input::get('DateEnd'),
            'condition'   => Input::get('conditions'),
            'price'   => Input::get('price'),
            'description'   => Input::get('description'),
            'listBusinessTag'   => json_encode(Input::get('listBusinessTag')),
            'businessId'   => Input::get('businessId'),
        );
        $file           =       Input::file('image');
        // 1: Band New, 2: Best Price, 3: Second Hand, 4: Good Condition)
       
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        if(json_decode($zeSocialBusinessResult)->data != ''){
            $jsonData = json_encode(json_decode($zeSocialBusinessResult)->data);
            $jsonData = json_decode($jsonData);
            $businessId = $jsonData->businessId;
            $productId = $jsonData->productId;
            // $jsonData = $zeSocialBusinessResult;
            $result = $this->postProductUpload($productId,$businessId,$file);
        }
        
        return $zeSocialBusinessResult;
        
        // return $zeSocialBusinessResult;
    }

    public function postProductUpload($productId,$businessId,$file){
        $function = 'productAdmin/add_image_gallery';
        // $file           =       Input::file('image');
        if ($file != null) {
            $fileName   =       $file->getClientOriginalName();
            $fileData   =       $file->getPathName();
        }
        $method   = 'POST';
        // $productId = '569ef10f7f8b9aa4088b4568';
        $dataRequest = array(
            'productId'          => $productId,
            'image'              => new \CurlFile($fileData,'image/jpg', $fileName),
            'businessId'         => $businessId,
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
        // return $fileName;
    }
    public function getProductById(){
        return view('product.viewProduct');
    }
    public function getPromotion(){

        return view('promotion.promotion');
    }

    public function getSelect (){
        // return 'sta';
        return view('product.selectData');
    }

}