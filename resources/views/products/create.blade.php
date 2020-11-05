@extends('layouts.app')

@section('title','Create Product')

@section('content')
<div>
    <a href="{{ route('product.index') }}" class="btn btn-success my-2">
        <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Create Product</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name">
                    @error('name') 
                        <div class="text-danger">
                            <label>{{ $message }}</label>
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                        </textarea>
                        @error('description') 
                            <div class="text-danger">
                                <label>{{ $message }}</label>
                            </div>
                        @enderror
                    </div>
                  </div>
                <div class="form-group">
                    <label>Count</label>
                    <input type="number" class="form-control @error('count') is-invalid @enderror" id="" name="count">
                    @error('count') 
                    <div class="text-danger">
                        <label>{{ $message }}</label>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="" name="price">
                    @error('price') 
                        <div class="text-danger">
                            <label>{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="" name="image">
                    @error('image') 
                        <div class="text-danger">
                            <label>{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option> 
                            @endforeach
                        </select>
                        @error('category_id') 
                            <div class="text-danger">
                                <label>{{ $message }}</label>
                            </div>
                        @enderror
                    </div>
                  </div>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection