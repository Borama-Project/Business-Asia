<?php

namespace App\Models;
use Request;
class ZeSocialBusinessModel
{

    public function __construct()
    {

    }

    protected $REDIRECT_URL= 'http://192.168.1.142/SocialBusinessWS/%s';

    protected $USER_NAME=  'zbuserweb';

    protected $USER_PASS=  'ZB@Us3RWeb';


    public function zeSocialRequest($function, $param=null, $method= null){
        $url = sprintf($this->REDIRECT_URL,$function);
        if($param ==null){
            $result = $this->curlConnect($url);
        }else{
            $result = $this->curlConnect($url,$param,$method);
        }
        return $result;
    }

    public function curlResponse ($url, $fields = array(), $method = null) {
        //username and password header
        $username = $this->USER_NAME;
        $password = $this->USER_PASS;
        // return json_encode($fields);
        // Post Date array
        $postvars = http_build_query($fields);
        // open connection
        $ch = curl_init();

        // set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        if($method == null){
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
        }else{
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
            //file upload
//            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        }
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // execute post
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    public function curlConnect ($url,  $fields = array(), $method= null) {

        $respon = $this->curlResponse($url, $fields, $method);
        if(json_decode($respon) == null){
            exit(view('errors.curl-data-error'));
        }
        return $respon;
    }
}
