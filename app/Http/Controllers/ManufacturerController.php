<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
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
      /* SELECT * FROM manufacturers ORDERED BY id DESC */
      $manufacturers = Manufacturer::orderBy('id', 'desc')->get();
      // $categories = Category::all();
      return view('manufacturer.index',['manufacturers' => $manufacturers]);
    }

    // apsirasome validacijos funkcija
    public function validation(Request $request) {
      // apsirasome validacija
      $request->validate([
        'title' => 'required|max:300',
        'website' => 'required|max:300',
        'country' => 'required|max:300'
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturer/create');
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

      $manufacturer = new Manufacturer();
      $manufacturer->title = $request->title;
      $manufacturer->website = $request->website;
      $manufacturer->country = $request->country;
      $manufacturer->save();
      // po issaugojimo nukreipiame i index puslapi
      return redirect()->route('manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturer/show', ['manufacturer' => $manufacturer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturer/edit', ['manufacturer' => $manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
      $this->validation($request);

      $manufacturer->title = $request->title;
      $manufacturer->website = $request->website;
      $manufacturer->country = $request->country;
      $manufacturer->save();

      // po issaugojimo nukreipiame i index puslapi
      return redirect()->route('manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
      $manufacturer->delete();
      return redirect()->route('manufacturers.index');
    }
}
