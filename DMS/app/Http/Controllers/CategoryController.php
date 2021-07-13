<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('categories')->with(["categories" => $categories]);
    }

    public function add(Request $request)
    {
        $category = null;
        
        if(isset($request->categoryId))
        {
            $category = Category::find($request->categoryId);
        }

        else{
            $category = new Category();
        }
        
        $category->name = $request->categoryName;
        $category->save();

        return redirect()->route('categories');
    }

    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete($id);
        return redirect()->route('categories');
    }

}
