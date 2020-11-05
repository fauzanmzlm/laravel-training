@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-header">Products</div>
        </div>
    </div>

    <div class="row justify-content-center pt-2">
        <div class="col-md-8">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card my-3" style="width: 100%;">
                    @if($product->image)
                    <img class="card-img-top" src="{{ url('images/'.$product->image) }}" width="150" height="150" style="object-fit: cover;" alt="photo">
                    @else
                    <img src="{{ url('images/noimage.png') }}"  width="160" height="160" style="object-fit: cover;" alt="photo">
                    @endif
                        <div class="card-body">
                        <p class="card-text font-weight-bold">{{ $product->name }}</p>
                        <p class="card-text">{{ Str::limit($product->description,100) }}</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="card-text font-weight-bold mt-2">RM {{ number_format($product->price,2) }}</p>
                            </div>
                            <div>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary"> 
                                <i class="fa fa-info"></i> Detail</a>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
            <hr />
            <div class="text-center">
                Copyright - Penjana Laravel Developemnt
            </div>
            

        </div>
    </div>

    

</div>
@endsection
