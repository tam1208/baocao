<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstController extends Controller
{
    //
    public function getController($stn,$sth){
    	$tong = $stn + $sth;
    	return $tong;
    }
    public function getView(){
    	$data['postname'] = ['Nampro','NguyenHuynhNhat','PHP','Laravel'];
    	return view('MyFirstView',$data);
    }
    public function getPost(){
    	return view('post');
    }
    public function getCategory(){
    	return view('category');
    }
}
