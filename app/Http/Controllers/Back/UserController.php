<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
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
public function update(UpdateRequest $request,$id){

      $data = $request->validated();


      
      if($data['password'] != ''){
          
          $data['password'] = Hash::make($data['password']);
          User::find($id)->update($data); 
      }
      else{
        User::find($id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'name'=> $request->name,
            'name'=> $request->name,
            ]);
      }

      return back()->with('success','Users has been updated');
   }

   public function destroy(string $id){
      User::find($id)->delete();
      return back()->with('success','Users has been deleted');

   }
}
