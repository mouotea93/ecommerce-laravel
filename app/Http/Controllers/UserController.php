<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(request $req){
        $user = User::where(['email' => $req->email])->first();
        if( !$user || !Hash::check($req->password, $user->password)){
            return "l'adress mail ou encore le mot de passe ne concorde pas";
        }
        else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }
}
