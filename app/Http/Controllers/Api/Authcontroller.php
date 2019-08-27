<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class Authcontroller extends Controller
{

    public function register(request $request)
    {
        $validatedData = $request ->validate([
            'name' =>'required | max:55',
            'email' => 'email| required',
            'password' => 'confirmed| required'
        ]);
        $va1idatedData['password'] = bcrypt ($request ->password) ; 
        $user = User::create ($validatedData);
        $accessToken = $user ->createToken('authToken') ->accessToken;
        return responce (['user' => $user , 'access_Token' => $accessToken]);
    }

    public function login(request $request){
        $loginData = $request -> $validate ([
                ' email ' =>  ' email | required',
                ' password ' => ' required ' 
                 ]);
                
        if( !auth() -> attempt ($loginData)) { 
        return responce ([' message ' => 'Invalid credentials']) ; 
         } 
        $accessToken = auth() -> user() -> createToken('authToken') ->accessToken;
        return responce (['user' => auth() -> user() , 'access_Token' => $accessToken]);
     
    }
}
