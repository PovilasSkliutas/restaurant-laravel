@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 mb-3">
      <a href="{{ route('categories.index') }}" class="btn btn-primary btn-md">back</a>
    </div>
  </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
          {{-- dd($errors) --}}
          <form action="{{ route('categories.update', $category->id) }}" method="POST" class="needs-validation">
            @csrf
            {{ method_field('PUT') }}
            
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value="{{old('title', $category->title)}}">
                @if($errors->has('title'))
                <div class="invalid-feedback">
                  {{ $errors->first('title') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <button type="create" class="btn btn-primary btn-block">Edit</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
