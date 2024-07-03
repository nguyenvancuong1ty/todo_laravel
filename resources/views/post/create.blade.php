@extends('layouts.layout')
@section('title')
    Create Post
@endsection
@section('content')

<form class = "mt-4" method="POST" action = "{{ route('post.postCreate') }}">
  @csrf
  <h3 class= "text-center">Create Post</h3>
  <div class="form-group mt-3">
    <label for="authRegisterTitle">Title</label>
    <input type="text" name="title" class="form-control" id="authRegisterTitle" value = "{{old('title')}}"/>
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('title'); }}</div>
      @endif
  </div>
  <div class="form-group mt-3">
    <label for="authRegisterDescription">Description</label>
    <input type="text" name="description" class="form-control" id="authRegisterDescription" value = "{{old('description')}}"/>
      @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('title'); }}</div>
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
  <div class="form-group mt-3">
    <label for="inputGroupSelectCountry">Author</label>
    <div class="d-flex mt-2">
      @foreach($users as $user)
            <div class="form-check me-4">
              <input value = "{{$user->id}}" class="form-check-input" type="radio" name="user_id">
              <label class="form-check-label" for="flexRadioDefault1">
                {{$user->name}}
              </label>
            </div>
        @endforeach
    </div>
    @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('user_id'); }}</div>
      @endif
  </div>
  <div class="form-group mt-3">
    <label for="inputGroupSelectCountry">Category</label>
    <div class="d-flex mt-2">
      @foreach($categories as $category)
            <div class="form-check me-4">
              <input value = "{{$category->id}}" class="form-check-input" type="radio" name="category_id">
              <label class="form-check-label" for="flexRadioDefault1">
                {{$category->name}}
              </label>
            </div>
        @endforeach
    </div>
    @if ($errors->any())  
        <div class= "text-danger">{{ $errors->first('category_id'); }}</div>
      @endif
  </div>
 
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>


@endsection

