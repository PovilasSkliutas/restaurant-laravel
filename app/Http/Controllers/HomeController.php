<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

      // $request->input('category'); // paima inputa is requesto
      // $request->category;

        if(!$request->category) {
            $products = Product::all();
        }
        else {
            $products = Product::where('category', $request->category)->get();
        }

        $categories = Category::all();
        return view('home', ['products' => $products,
                            'categories' => $categories]);

    }
}
