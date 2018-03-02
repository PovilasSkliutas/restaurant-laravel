<div class="card">
  <img class="card-img-top" src="https://loremflickr.com/320/240/food" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">
      {{$product->title}}
    </h5>
    <h5 class="card-text">
      Price:
      <span class="badge badge-success">{{$product->price}}</span>
    </h5>
    <h5 class="card-text">
      Quantity:
      <span class="badge badge-primary">{{$product->quantity}}</span>
    </h5>
    @if(isset($product->categories))
    <h5 class="card-text">
      Category:
      <span class="badge badge-secondary">{{$product->categories->title}}</span>
    </h5>
    @endif
    <h5 class="card-text">
      Manufacturer:
      <span class="badge badge-secondary">{{$product->manufacturers->title}}</span>
    </h5>
    <p class="card-text">{{$product->description}}</p>

    @if($admin == FALSE)
      <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Read more</a>
    @else
      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
      <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="form-inline">
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
    @endif

  </div>
</div>
