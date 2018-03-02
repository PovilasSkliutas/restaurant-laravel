@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{--dd($products)--}}

        <div class="col-md-6">
          @component('components/card', ['product' => $product,
                                         'admin' => TRUE])
          @endcomponent
        </div>
    </div>
</div>
@endsection
