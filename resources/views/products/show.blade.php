@extends('layouts.app')

@section('title','Detail Product')

@section('content')
<div>
    <a href="{{ route('product.index') }}" class="btn btn-success my-2">
        <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Product Detail</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <span class="font-weight-bold">Name</span> : {{ $product->name }}
            </div>
            <div class="form-group">
                <span class="font-weight-bold">Decription</span> : {{ $product->name }}
            </div>
            <div class="form-group">
                <span class="font-weight-bold">Count</span> : {{ $product->name }}
            </div>
            <div class="form-group">
                <span class="font-weight-bold">Price</span> : RM {{ $product->name }}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Photo :</label>
                <div>
                    @if($product->image)
                        <img src="{{ asset('/images/'.$product->image)}}" width="200" alt="photo" />
                    @else
                        <img src="{{ asset('/images/noimage.png')}}"  width="200" alt="photo" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection