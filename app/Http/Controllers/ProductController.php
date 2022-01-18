<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['guest']);
    }

    public function index(){
        return view('products.add');
    }

    public function show(Product $product){
        $cartItems = Cart::where('user_id',Auth::guard('user')->user()->id)->get();
        return view('products.show',[
            'product'=>$product,
            'cartItems'=>$cartItems
        ]);
    }

    public function store(Request $request){
        // dd($request);
        $data = $this->validate($request,[
            'brand' => 'required|max:30',
            'name' => 'required|max:50',
            'quantity' => 'required|integer:min:0|max:500',
            'price' => 'required|integer:min:0|max:500000',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('images/products','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,500);
        $image->save();

        Product::create([
            'brand' => $request->brand,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.home');
    }

    public function destroy(Product $product){
        // dd($product);
        $product->delete();
        // return Response::json($product,200);
        return back();
    }

    public function edit(Product $product){
        // dd($product);
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request ,Product $product){
        $data = $this->validate($request,[
            'name' => 'max:30',
            'username' => 'max:50',
            'quantity' => 'integer|min:0|max:500',
            'price' => 'integer|min:0|max:500000',
            'description' => '',
            'image' => '',
        ]);
        $imagePath = $product->image;
        if(request('image')){
            $imagePath = request('image')->store('images/products','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400,500);
            $image->save();
        }
        // dd($data);
        $product->update(
            array_merge(
                $data, ['image'=>$imagePath]
            )
        );
        return redirect()->route('admin.home');
    }
}
