@extends('layouts.layout')
@section('title')
   Post
@endsection

@section('content')
    <div class="mt-3 d-flex justify-content-between">
        <div class="d-flex">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ ucfirst(request()->status ?? 'Status') }}
            </button>
            <ul class="dropdown-menu">
                @foreach(\App\Enums\StatusEnum::values() as $status)
                    <li><a class="dropdown-item" href="{{ route('post.index', ['status' => $status, 'limit' => 2])}}">{{$status}}</a></li>
                    @endforeach
            </ul>
        </div>
        <!-- <x-select-limit /> -->
        </div>
        <a href="{{ route('post.getCreate') }}" class= "btn btn-primary">Create</a>
    </div>
    <hr>
    
    <div class="row mt-3">
            <div class="col-12 align-self-center">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        </tr>
                    </thead>
                    @if ($posts->isNotEmpty()) 
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->status}}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td> 
                            <td>
                                <a class= "btn btn-info" href = "{{route('post.getUpdate', $post->id)}}">Update</a>
                                <a class= "btn btn-danger" href = "{{route('post.destroy', $post->id)}}">Delete</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @endif
                    
                </table>
            </div>
        </div>
        
        {{ $posts->links('vendor.pagination.custom') }}
@endsection