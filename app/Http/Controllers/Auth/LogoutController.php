<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store(){
        Auth::guard('user')->logout();
        Auth::guard('admin')->logout();

        return redirect()->route('users.home');
    }
}