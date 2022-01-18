<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['guest']);
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:user');
    }

    // public function index(){
    //     return view('auth.register');
    // }
    public function adminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function userRegisterForm()
    {
        return view('auth.register', ['url' => 'user']);
    }

    public function storeAdmin(Request $request){
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        Admins::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

        return redirect()->intended('/admin');
    }
    public function storeUser(Request $request){
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);

        return redirect()->intended('/');
    }
}
