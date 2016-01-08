<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function getIndex()
    {
        return view('user/index');
    }

    public function postIndex(){
        $array = array();
        for($i=1;$i<21;$i++){
            $array[] = array(
                "id"        =>  $i,
                "name"      =>  "name".$i,
                "price"     =>  "price".$i,
                "color"     =>  "color".$i,
                "qlt"       =>  "qlt".$i,
                "action"    =>  "action".$i,
            );
        }
        return $array;
    }
    public function getInfo()
    {

        return view('user.info');
    }


}