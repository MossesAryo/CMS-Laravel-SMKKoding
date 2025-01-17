<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index(){
    return view('back.user.index',[
        'users' => User::get()
    ]);
   }

   public function store(UserRequest $request){

      $data = $request->validated();


      $data['password'] = Hash::make($data['password']);
      User::create($data); 
      return back()->with('success','Users has been created');




   }
}
