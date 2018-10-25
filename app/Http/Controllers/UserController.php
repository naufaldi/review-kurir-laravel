<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    public function registerConfirmation($token)
    {
        $user = User::where('token_register', $token)->first();
        $user->status_register = 1;
        $user->token_register = "NULL";
        $user->update();

        return redirect()->route('home');
    }
}
