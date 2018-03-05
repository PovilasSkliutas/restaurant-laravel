@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('home') }}" method="GET">
      <div class="row">

              <div class="col-md-8 mb-3">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="categories">Options</label>
                        </div>
                        <select class="custom-select" id="categories" name="category">
                          <option selected>Choose...</option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}" @if($category->id == Request::input('category')) selected @endif>{{ $category->title }}</option>
                          @endforeach
                        </select>
                      </div>
              </div>
              <div class="col-md-4">
                  <button type="submit" class="btn btn-primary btn-block">Filter</button>
              </div>
      </div>
    </form>

    {{-- @if(Auth::user()) --}}
    @auth
    <div class="row justify-content-end">
      <div class="col-md-4">
        <a href="{{ route('categories.index') }}" class="btn btn-info btn-block">Categories</a>
        <hr>
      </div>
      <div class="col-md-4">
        <a href="{{ route('manufacturers.index') }}" class="btn btn-info btn-block">Manufacturers</a>
        <hr>
      </div>
      <div class="col-md-4">
        <a href="{{ route('products.create') }}" class="btn btn-success btn-block">Create</a>
        <hr>
      </div>
    </div>
    @endif

    <div class="row justify-content-center">
      @foreach ($products as $product)
        <div class="col-md-4 card-deck">
          @component('components/card', ['product' => $product,
                                         'admin' => FALSE]) <!-- komponento nustatymas -->
          @endcomponent
        </div>
      @endforeach
    </div>
</div>
@endsection
