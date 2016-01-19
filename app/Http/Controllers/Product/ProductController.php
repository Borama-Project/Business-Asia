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
        $dataRequest = array(
            'accessKey'    => 'NTY4ZjgzMjE3ZjhiOWFjZjA5OGI0NTc1MjAxNi0wMS0wOCAwOTozNjozM1NvY2lhbEJ1c2luZXNz',
        );
        $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        return ($zeSocialBusinessResult);
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
        $function = 'businessAdmin/add_product';
        $method = 'POST';
        $dataRequest = array(

            'name'=> Input::get('name'),
            'productCategoryId' => Input::get('productCategoryId'),
            'currency'   => Input::get('currency'),
            'dateStart'   => Input::get('DateStart'),
            'dateEnd'   => Input::get('DateEnd'),
            'condition'   => Input::get('condition'),
            'price'   => Input::get('price'),

        );
        // 1: Band New, 2: Best Price, 3: Second Hand, 4: Good Condition)
       
        // $ZeSocialBusinessModel = new ZeSocialBusinessModel;
        // $zeSocialBusinessResult = $ZeSocialBusinessModel->zeSocialRequest($function,$dataRequest,$method);
        // return ($zeSocialBusinessResult);
        // return ;
        return json_encode($dataRequest);
    }

    public function getProductById(){
        return view('product.viewProduct');
    }
    public function getPromotion(){

        return view('promotion.promotion');
    }

}