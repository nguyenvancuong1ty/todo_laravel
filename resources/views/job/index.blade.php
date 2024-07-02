@extends('layouts.layout')
@section('title')
    My Todo App
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-12 align-self-center">
           <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                        <th scope="row">{{$job->id}}</th>
                        <td>{{$job->title}}</td>
                        <td>{{$job->descriptions}}</td>
                        <td>
                            <a class= "btn btn-info" href = "/job/update/{{$job->id}}">Update</a>
                            <a class= "btn btn-danger">Delete</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
