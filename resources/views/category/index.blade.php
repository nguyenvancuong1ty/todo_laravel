@extends('layouts.layout')
@section('title')
   Category
@endsection

@section('content')
    <div class="row mt-3">
            <div class="col-12 align-self-center">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    @if ($categories->isNotEmpty()) 
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status}}</td>
                            <td>
                                <a class= "btn btn-info" href = "{{route('category.getUpdate', $category->id)}}">Update</a>
                                <a class= "btn btn-danger" href = "{{route('category.destroy', $category->id)}}">Delete</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @endif
                    
                </table>
            </div>
        </div>
        {{ $categories->links('vendor.pagination.custom') }}
    <a href="{{ route('category.getCreate') }}" class= "btn btn-primary">Create</a>
@endsection