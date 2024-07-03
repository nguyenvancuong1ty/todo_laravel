@extends('layouts.layout')
@section('title')
    Create Category
@endsection
@section('content')

<form class = "mt-4" method="POST" action = "{{ route('category.postCreate') }}">
  @csrf
  <h3 class= "text-center">Create Category</h3>
  <div class="form-group mt-3">
    <label for="authRegisterName">Name</label>
    <input type="text" name="name" class="form-control" id="authRegisterName" value = "{{old('name')}}"/>
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('name'); }}</div>
      @endif
  </div>
  <div class="form-group mt-3">
    <label for="inputGroupSelectCountry">Status</label>
    <div class="d-flex mt-2">
      @foreach(App\Enums\StatusEnum::values() as $value)
            <div class="form-check me-4">
              <input value = "{{$value}}" class="form-check-input" type="radio" name="status">
              <label class="form-check-label" for="flexRadioDefault1">
                {{$value}}
              </label>
            </div>
        @endforeach
    </div>
    @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('status'); }}</div>
      @endif
  </div>
 
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>


@endsection

