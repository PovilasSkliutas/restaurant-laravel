@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @if(Auth::user()) --}}
    @auth
    <div class="row justify-content-end">
      <div class="col-md-3">
        <a href="{{ route('manufacturers.create') }}" class="btn btn-success btn-block">Create</a>
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
              <th scope="col" class="text-center">Website</th>
              <th scope="col" class="text-center">Country</th>
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
            @foreach ($manufacturers as $manufacturer)
            <tr>
              <th class="text-center">{{ $manufacturer->id}}</th>
              <td class="text-center font-weight-bold">{{ $manufacturer->title}}</td>
              <td class="text-center">
                <a href="#">{{ $manufacturer->website}}</a>
              </td>
              <td class="text-center">{{ $manufacturer->country}}</td>
              <td class="text-center">{{ $manufacturer->created_at}}</td>
              <td class="text-center">{{ $manufacturer->updated_at}}</td>

              {{-- @if(Auth::user()) --}}
              @auth
              <td class="text-center">
                <a href="{{ route('manufacturers.edit', $manufacturer->id) }}" class="btn btn-warning btn-sm">Edit</a>
              </td>
              <td class="text-center">
                <form action="{{ route('manufacturers.destroy', $manufacturer->id) }}" method="POST">
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
