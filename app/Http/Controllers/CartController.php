<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index(){
    }

    public function store(Request $request,Product $product){
        // dd($product);
        $user_id = Auth::guard('user')->user()->id;
        Cart::create([
            'user_id'=>$user_id,
            'product_id'=>$product->id,
            'name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'image' => $product->image,
        ]);

        $cartItems = Cart::where('user_id',Auth::guard('user')->user()->id)->get();
        // dd($cartItems);
        return redirect()->route('product.show',$cartItems);
        // dd($user_id);
    }
}
