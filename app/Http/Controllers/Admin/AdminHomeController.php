<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
        // $this->middleware('auth:admin');
        // $this->middleware('auth:user');   
    }
    public function index(){
        $products = Product::latest()->paginate(9);

        return view('admin.home',['products' => $products]);
    }
}
