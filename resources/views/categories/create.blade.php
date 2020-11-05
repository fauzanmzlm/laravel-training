@extends('layouts.app')

@section('title','Create Category')

@section('content')
<div>
    <a href="{{ route('category.index') }}" class="btn btn-success my-2">
        <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Create Category</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.store') }}">
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
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection