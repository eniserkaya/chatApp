<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AppController extends Controller
{
    public function init()
    {
        $user = Auth::user();
        return response()->json(['user'=>$user],200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password], true)) {
            return response()->json(['user'=>Auth::user()],200);
        }
        else{
            return response()->json(['error'=>'Oturum açılamadı.'],401);
        }
    }

    public function register(Request $request)
    {
//        $user = User::where('name', $request->username)->first;
//        if (isset($user->id)) {
//            return response()->json(['error' => "Kullanıcı zaten kayıtlı."], 401);
//        }

        $user = new User();

        $user->name = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = "asdeneme@deneme.com";

        $user->save();

        Auth::login($user);

        return response()->json($user, 200);

    }

    public function logout()
    {
        Auth::logout();
    }
}
