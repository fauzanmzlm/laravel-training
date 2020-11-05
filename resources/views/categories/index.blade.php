@extends('layouts.app')

@section('title','Create Category')

@section('content')
<div>
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-success my-2">
        <i class="fa fa-plus"></i> Create
    </a>
    <div class="card">
        <div class="card-header">
            <h5>Category</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" width="280">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">
                            <i class="fa fa-info"></i> Show
                        </a> 
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form style="display:inline;" action="{{ route('category.destroy', $category->id) }}" method="post">
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
              {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection