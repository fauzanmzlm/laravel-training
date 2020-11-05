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
                <span class="font-weight-bold">Product under this category</span> :
            </div>
            <div class="form-group">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card my-3" style="width: 18rem;">
                        @if($product->image)
                        <img class="card-img-top" src="{{ url('images/'.$product->image) }}" width="150" alt="photo">
                        @else
                        <img src="{{ url('images/noimage.png') }}"  width="150" alt="photo">
                        @endif
                            <div class="card-body">
                            <p class="card-text font-weight-bold">{{ $product->name }}</p>
                            <p class="card-text">{{ $product->description }}</p>
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