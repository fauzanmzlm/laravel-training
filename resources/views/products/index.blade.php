@extends('layouts.app')

@section('title','Create Product')

@section('content')
<div>
    <a href="{{ route('product.create') }}" class="btn btn-success my-2">
        <i class="fa fa-plus"></i> Create
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Products</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Total   </th>
                    <th scope="col">Price</th>
                    <th scope="col" width="280">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>
                        @if($product->image)
                        <img src="{{ url('images/'.$product->image) }}" width="150" alt="photo">
                        @else
                        <img src="images/noimage.png"  width="150" alt="photo">
                        @endif
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->count }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-info">
                            <i class="fa fa-info"></i> Show
                        </a> 
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form style="display:inline;" action="{{ route('product.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                        
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
              </table>
              {{ $products->links() }}
        </div>
    </div>
</div>
@endsection