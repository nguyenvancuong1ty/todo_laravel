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
                    <th scope="col">Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Address</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->sex}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->birthday}}</td> 
                        <td>
                            <a class= "btn btn-info" href = "/auth/update/{{$user->id}}">Update</a>
                            <a class= "btn btn-danger" href = "/auth/delete/{{$user->id}}">Delete</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<a href="{{ route('auth.getRegister') }}" class= "btn btn-primary">Create</a>
@endsection
