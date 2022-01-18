<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['guest']);
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function index(){
        return view('auth.login');
    }
    public function adminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }
    public function userLoginForm()
    {
        return view('auth.login', ['url' => 'user']);
    }

    public function storeAdmin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::guard('admin')->attempt($request->only('email','password'), $request->remember)){
            return back()->with('status','Invalid Login Details');
        }
        return redirect()->route('admin.home');
    }

    public function storeUser(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::guard('user')->attempt($request->only('email','password'), $request->remember)){
            return back()->with('status','Invalid Login Details');
        }
        return redirect()->intended('/');
    }


}
