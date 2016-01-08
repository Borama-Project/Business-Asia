<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
//    public function __construct()
//    {
//        parent::__construct();
//        $this->viewFolder = $this->viewFolder.".user";
//    }

    public function getIndex()
    {
        return view('index');
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

    public function postInfo(){
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


    public function getAbout()
    {

        return view('user.about');
    }

    public function postAbout(){
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
}