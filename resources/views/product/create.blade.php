@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-3">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">back</a>
      </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
          {{-- dd($errors) --}}
          <form action="{{route('products.store')}}" method="POST" class="needs-validation">

            @csrf

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" placeholder="enter title" value="{{old('title')}}">
                @if($errors->has('title'))
                <div class="invalid-feedback">
                  {{$errors->first('title')}}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="price">Price</label>
                <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" name="price" placeholder="0.00$" value="{{old('price')}}">
                  @if($errors->has('price'))
                  <div class="invalid-feedback">
                    {{$errors->first('price')}}
                  </div>
                  @endif
              </div>
              <div class="col-md-6 mb-3">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control @if($errors->has('quantity')) is-invalid @endif" id="quantity" name="quantity" value="{{old('quantity')}}">
                  @if($errors->has('quantity'))
                  <div class="invalid-feedback">
                    {{$errors->first('quantity')}}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @if($errors->has('description')) is-invalid @endif" id="description" name="description" rows="3" placeholder="enter description">{{old('description')}}</textarea>
                  @if($errors->has('description'))
                  <div class="invalid-feedback">
                    {{$errors->first('description')}}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="category">Category</label>
                <select class="custom-select d-block w-100 @if($errors->has('category')) is-invalid @endif" id="category" name="category" value="{{old('category')}}">
                  <option value="">Choose...</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}" @if($category->id == old('category')) selected @endif>
                    {{$category->title}}
                  </option>
                  @endforeach
                </select>
                  @if($errors->has('category'))
                  <div class="invalid-feedback">
                    {{$errors->first('category')}}
                  </div>
                  @endif
              </div>
              <div class="col-md-6 mb-3">
                <label for="manufacturer">Manufacturer</label>
                <select class="custom-select d-block w-100 @if($errors->has('manufacturer')) is-invalid @endif" id="manufacturer" name="manufacturer" value="{{old('manufacturer')}}">
                  <option>Choose..</option>
                  @foreach ($manufacturers as $manufacturer)
                  <option value="{{$manufacturer->id}}" @if($manufacturer->id == old('manufacturer')) selected @endif>
                    {{$manufacturer->title}}
                  </option>
                  @endforeach
                </select>
                  @if($errors->has('manufacturer'))
                  <div class="invalid-feedback">
                    {{$errors->first('manufacturer')}}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <button type="create" class="btn btn-primary btn-block">Create</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
