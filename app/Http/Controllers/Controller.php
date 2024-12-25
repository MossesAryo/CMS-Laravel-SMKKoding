<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index(){
        return view('dashboard.index');
    }
    
    public function user(){
        return view('dashboard.user');
    }
    public function articles(){
        return view('dashboard.articles');
    }
    public function categories(){
        return view('dashboard.categories');
    }
}
