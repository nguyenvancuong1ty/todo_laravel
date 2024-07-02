@extends('layouts.layout')
@section('title')
    Create job
@endsection
@section('content')
<form  method="post" action="{{ route('job.postUpdate') }}">
    @csrf
  <div class="form-group">
    <input value ="{{$job->id}}" class="form-control" id="id" name="id" type="hidden">
  </div>
  <div class="form-group">
    <label for="title">Title</label>
    <input value ="{{$job->title}}" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="descriptions">Descriptions</label>
    <input value ="{{$job->descriptions}}" type="text" class="form-control" id="descriptions" name="descriptions" placeholder="Descriptions">
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
