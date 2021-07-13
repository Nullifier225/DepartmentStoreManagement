<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home')->with(["products" => $products]);
    }

    public function add(Request $request)
    {
        $product = null;
        
        if(isset($request->productId))
        {
            $product = Product::find($request->productId);
        }

        else{
            $product = new Product();
        }
        
        $product->name = $request->productName;
        $product->save();

        return redirect()->route('home');
    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete($id);
        return redirect()->route('home');
    }

}
