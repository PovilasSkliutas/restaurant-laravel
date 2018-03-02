<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Manufacturer;

class ProductController extends Controller {

    // aprasome metoda create
    public function create() {

      $categories = Category::all();
      $manufacturers = Manufacturer::all();

      return view('product/create',
      [
          'categories' => $categories,
          'manufacturers' => $manufacturers
      ]);
    }

    // aprasome metoda delete
    public function destroy(Request $request) {

      $product = Product::find($request->id);
      $product->delete();

      return redirect()->route('home');

    }

    // apsirasome validacijos funkcija
    public function validation(Request $request) {
      // apsirasome validacija
      $request->validate([
        'title' => 'required|max:300',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'required|max:1000',
        'category' => 'nullable',
        'manufacturer' => 'required'
      ]);
    }

    // aprasome metoda store
    public function store(Request $request) {
      // dd($request);

      $this->validation($request);

      $product = new Product();
      $product->title = $request->title;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->description = $request->description;
      $product->category = $request->category;
      $product->manufacturer = $request->manufacturer;
      $product->save();

      //dd($product->id);
      // po issaugojimo nukreipiame i producto puslapi
      return redirect()->route('products.show', $product->id);
    }

    // aprasome metoda edite
    public function edit(Request $request) {

      $categories = Category::all();
      $manufacturers = Manufacturer::all();

      $product = Product::find($request->id);
      //dd($product);

      return view('product/edit', [
        'categories' => $categories,
        'manufacturers' => $manufacturers,
        'product' => $product
      ]);
    }

    // aprasome metoda update
    public function update(Request $request) {

      $this->validation($request);

      $product = Product::find($request->id);
      $product->title = $request->title;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->description = $request->description;
      $product->category = $request->category;
      $product->manufacturer = $request->manufacturer;
      $product->save();

      //dd($product->id);
      // po issaugojimo nukreipiame i producto puslapi
      return redirect()->route('products.update', $product->id);

    }

    // aprasome metoda show, parodyti viena product'a
    public function show(Request $request) {
      /* SELECT * FROM products where id = $id */
      $product = Product::findOrFail($request->id);

      return view('product/show', ['product' => $product]);
    }
}
