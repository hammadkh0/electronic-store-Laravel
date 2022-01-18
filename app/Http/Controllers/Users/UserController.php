<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['guest']);
    }
    public function index(){
        $products = Product::latest()->paginate(9);
        return view('users.home',['products' => $products]);
    }
}