@extends('layouts.app')

@section('content')
<div class="container">

    {{-- @if(Auth::user()) --}}
    @auth
    <div class="row justify-content-end">
      <div class="col-md-3">
        <a href="{{ route('categories.index') }}" class="btn btn-info btn-block">Categories</a>
        <a href="{{ route('manufacturers.index') }}" class="btn btn-info btn-block">Manufacturers</a>
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
