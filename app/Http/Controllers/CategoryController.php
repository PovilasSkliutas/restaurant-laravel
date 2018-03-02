<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct() {
      //uzdeda middleware grupe ant visu kontroleriu, o except nuima nurodytam kontroleriui
      $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /* SELECT * FROM categories ORDERED BY id DESC */
      $categories = Category::orderBy('id', 'desc')->get();
      // $categories = Category::all();
      return view('category.index',['categories' => $categories]);
    }

    // apsirasome validacijos funkcija
    public function validation(Request $request) {
      // apsirasome validacija
      $request->validate([
        'title' => 'required|max:300',
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validation($request);

      $category = new Category();
      $category->title = $request->title;
      $category->save();
      // po issaugojimo nukreipiame i index puslapi
      return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category/show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //echo "edit'as veikia! woop woop!";
        return view('category/edit', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $this->validation($request);

      $category->title = $request->title;
      $category->save();

      // po issaugojimo nukreipiame i index puslapi
      return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      $category->delete();
      return redirect()->route('categories.index');
    }
}
