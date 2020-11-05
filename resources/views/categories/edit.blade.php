@extends('layouts.app')

@section('title','Edit Category')

@section('content')
<div>
    <a href="{{ route('category.index') }}" class="btn btn-success my-2">
        <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Edit Category</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" value="{{ $category->name }}" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name">
                    @error('name') 
                        <div class="text-danger">
                            <label>{{ $message }}</label>
                        </div>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection