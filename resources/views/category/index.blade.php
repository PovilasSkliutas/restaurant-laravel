@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @if(Auth::user()) --}}
    @auth
    <div class="row justify-content-end">
      <div class="col-md-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-block">Create</a>
        <hr>
      </div>
    </div>
    @endif
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead class="table-active">
            <tr>
              <th scope="col" class="text-center">#ID</th>
              <th scope="col" class="text-center">Title</th>
              <th scope="col" class="text-center">Created</th>
              <th scope="col" class="text-center">Updated</th>
              {{-- @if(Auth::user()) --}}
              @auth
              <th scope="col" class="text-center">Edite</th>
              <th scope="col" class="text-center">Delete</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <th class="text-center">{{ $category->id}}</th>
              <td class="text-center font-weight-bold" style="color: blue">{{ $category->title}}</td>
              <td class="text-center">{{ $category->created_at}}</td>
              <td class="text-center">{{ $category->updated_at}}</td>
              {{-- @if(Auth::user()) --}}
              @auth
              <td class="text-center">
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
              </td>
              <td class="text-center">
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
