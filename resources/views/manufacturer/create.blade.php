@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 mb-3">
      <a href="{{ route('manufacturers.index') }}" class="btn btn-primary btn-md">back</a>
    </div>
  </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
          {{-- dd($errors) --}}
          <form action="{{ route('manufacturers.store') }}" method="POST" class="needs-validation">

            @csrf

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" placeholder="enter title" value="{{old('title')}}">
                @if($errors->has('title'))
                <div class="invalid-feedback">
                  {{ $errors->first('title') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="website">Website</label>
                <input type="text" class="form-control @if($errors->has('website')) is-invalid @endif" id="website" name="website" placeholder="enter website" value="{{old('website')}}">
                @if($errors->has('website'))
                <div class="invalid-feedback">
                  {{ $errors->first('website') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control @if($errors->has('country')) is-invalid @endif" id="country" name="country" placeholder="enter country" value="{{old('country')}}">
                @if($errors->has('country'))
                <div class="invalid-feedback">
                  {{ $errors->first('country') }}
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
