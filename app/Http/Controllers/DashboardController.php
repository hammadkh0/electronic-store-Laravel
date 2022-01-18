<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        $this->middleware('auth:user');
    }
    public function index(){
        // dd(request()->user());
        return view('users.dashboard',['user'=>Auth::guard('user')->user()]);
    }

    public function update(Request $request, User $user){
        // dd($request);

        $data = $this->validate($request,[
            'name' => 'max:30',
            'username' => 'max:50',
            'email' => 'email|min:0|max:500',
            'password' => 'min:5',
        ]);
        // dd($data);
        $user->update(
            array_merge(
                $data, ['password'=>Hash::make($request->password)]
            )
        );
        return back()->with('status','Update Successful');
    }

}
