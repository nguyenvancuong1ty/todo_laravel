@extends('layouts.layout')
@section('title')
    Login
@endsection
@section('content')

<form class = "mt-4" method="POST" action = "{{ route('auth.postLogin') }}">
  @csrf
  <h3 class= "text-center">Login</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name = "email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    @if ($errors->any())  
      <div class= "text-danger">{{ $errors->first('email'); }}</div>
    @endif
  </div>
  <div class="form-group mt-3">
    <label for="exampleInputPassword2">Password</label>
    <input name = "password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
    @if ($errors->any())  
      <div class= "text-danger">{{ $errors->first('password'); }}</div>
    @endif
  </div>
  <div class="form-group mt-3 d-flex align-items-center">
    <label for="remember_me" class="me-4">Remember</label>
    <input name = "rememberMe" type="checkbox" id="remember_me" value="true">
  </div>
 
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
<!-- auth/login.blade.php -->






@endsection

