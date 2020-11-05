@extends('layouts.app')

@section('title','Detail category')

@section('content')
<div>
    <a href="{{ route('category.index') }}" class="btn btn-success my-2">
        <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Category Detail</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <span class="font-weight-bold">Name</span> : {{ $category->name }}
            </div>
            <div class="form-group">
                <span class="font-weight-bold">Products of category</span> :
            </div>
            <div class="form-group">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card my-3" style="width: 18rem;">
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
            </div>
        </div>
    </div>
</div>
@endsection