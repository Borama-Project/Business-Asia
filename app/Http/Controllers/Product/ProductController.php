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
        $function = 'productAdmin/get_product';
        if(Input::get('productId')){
            $dataRequest = array(
                'productId'    => Input::get('productId'),
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
        $function = 'productAdmin/get_product';
        $res = Input::All();
        $dataRequest = array();
        $authorId = json_decode(Session::get('zeAccessKey'));
        
        foreach ($res as $key => $value) {
            if($value != ''){
                $dataRequest[$key] = $value;
            }
        }
        if(sizeof($dataRequest)<= 0){
            $dataRequest = array(
                'accessKey'          => $authorId->AccessKey,
            );
        }

        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
        // return json_encode($dataRequest);
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
        if(Input::get('listBusinessTag') !=''){
            $listBusinessTag = explode(",", Input::get('listBusinessTag'));
            $listBusinessTag = json_encode($listBusinessTag);
        }
       
        $categoryId = array(Input::get('categoryId'));
        $currency = Input::get('currency');
        if($currency == ''){
            $currency = 1;
        }
        $dataRequest = array(

            'name'=> Input::get('name'),
            'productCategoryId' => Input::get('productCategoryId'),
            'currency'   => $currency,
            'dateStart'   => Input::get('dateStarts'),
            'dateEnd'   => Input::get('dateEnds'),
            'condition'   => Input::get('condition'),
            'price'   => Input::get('price'),
            'description'   => Input::get('description'),
            'listBusinessTag'   => $listBusinessTag,
            'listCategoryId' => json_encode($categoryId),
            'businessId'   => Input::get('businessId'),
        );
        
        $file1           =       Input::file('image1');
        $file2           =       Input::file('image2');
        $file3           =       Input::file('image3');
        $file4          =       Input::file('image4');
        // 1: Band New, 2: Best Price, 3: Second Hand, 4: Good Condition)
       
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        if(json_decode($zeSocialBusinessResult)->data != ''){
            $jsonData = json_encode(json_decode($zeSocialBusinessResult)->data);
            $jsonData = json_decode($jsonData);
            $businessId = $jsonData->businessId;
            $productId = $jsonData->productId;
            // $jsonData = $zeSocialBusinessResult;
            if($file1){
                $result = $this->postProductUpload($productId,$businessId,$file1);
            }

            if($file2){
                $result = $this->postProductUpload($productId,$businessId,$file2);
            }
            if($file3){
                $result = $this->postProductUpload($productId,$businessId,$file3);
            }if($file4){
                $result = $this->postProductUpload($productId,$businessId,$file4);
            }
            
        }
        return $zeSocialBusinessResult;
        
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
    public function getUpdateProduct(){

    }
    

}