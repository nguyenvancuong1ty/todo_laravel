@extends('layouts.layout')
@section('title')
    Create job
@endsection
@section('content')
<form  method="post" action="{{ route('job.postCreate') }}">
    @csrf
  <div class="form-group" enctype = "multipart-data">
    <label for="title">Title</label>
    <input value="{{ old('title') }}" type="title" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="descriptions">Descriptions</label>
    <input value="{{ old('descriptions') }}" type="text" class="form-control" id="descriptions" name="descriptions" placeholder="Descriptions">
  </div>
  <div class="form-group">
    <label for="Image">Image</label>
    <input type="file" class="form-control" id="descriptions" name="image" placeholder="Image">
  </div>
  <button type="submit" class="btn btn-primary mt-4">Submit</button>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>

@endsection
