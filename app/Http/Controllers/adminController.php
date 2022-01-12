<?php

namespace App\Http\Controllers;
use App\Models\admin;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{  
     public function login(Request $request){
        $credentials=$request->only('email','password');
      
         $admin=auth()->admin();
         $data['token']=auth()->claims([
             'admin_id'=>$admin->id,
             'email'=>$admin->email,
             'name'=>$admin->name,
         ])->attempt($credentials);
         $response['data']=$data;
         $response['status']=1;
         $response['code']=200;
         $response['message']='Connexion effectuée';
         return response()->json($response);
    }
}
