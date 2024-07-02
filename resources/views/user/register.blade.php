@extends('layouts.layout')
@section('title')
    Register
@endsection
@section('content')

<form class = "mt-4" method="POST" action = "{{ route('auth.postRegister') }}">
  @csrf
  <h3 class= "text-center">Register</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name = "email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    @if ($errors->any())  
      <div class= "text-danger">{{ $errors->first('email'); }}</div>
    @endif
  </div>
  <div class="form-group mt-3">
    <label for="exampleInputPassword1">Password</label>
    <input name = "password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @if ($errors->any())  
      <div class= "text-danger">{{ $errors->first('password'); }}</div>
    @endif
  </div>
  <div class="form-group mt-3">
    <label for="exampleInputPassword2">Password Confirm</label>
    <input name = "password_confirmation" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password Confirm">
    @if ($errors->any())  
      <div class= "text-danger">{{ $errors->first('password'); }}</div>
    @endif
  </div>
   <div class="form-group mt-3">
    <label for="fullName">Full name</label>
    <input name = "name" value="{{ old('email') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('name'); }}</div>
      @endif
  </div>
  <div class="form-group mt-3">
    <label for="authRegisterBirthday">Birthday</label>
    <input type="text" name="birthday" class="form-control" id="authRegisterBirthday" />
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('birthday'); }}</div>
      @endif
  </div>
  <div class="form-group mt-3">
    <label for="inputGroupSelectCountry">Sex</label>
    <div class="d-flex mt-2">
      @foreach(App\Enums\SexEnum::values() as $value)
            <div class="form-check me-4">
              <input value = "{{$value}}" class="form-check-input" type="radio" name="sex">
              <label class="form-check-label" for="flexRadioDefault1">
                {{$value}}
              </label>
            </div>
        @endforeach
    </div>
    @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('sex'); }}</div>
      @endif
  </div>
  <div class=" form-group mb-3 mt-3">
    <label for="inputGroupSelectCountry">Country</label>
    <select class="form-select" id="inputGroupSelectCountry" name= "country">
        <option selected>Choose a country</option>
    </select>
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('country'); }}</div>
      @endif
</div>
<div class=" form-group mb-3 mt-3">
    <label for="inputGroupSelectCity">City</label>
    <select class="form-select" id="inputGroupSelectCity" name= "city">
        <option selected>Choose a City</option>
    </select>
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('city'); }}</div>
      @endif
</div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>


@endsection

