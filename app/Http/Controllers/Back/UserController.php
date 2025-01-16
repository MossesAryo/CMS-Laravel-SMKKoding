<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
    return view('back.user.index',[
        'users' => User::get()
    ]);
   }
}
