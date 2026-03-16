@extends('admin.components.app')

@section('content')

<div class="container">

<h3>{{ isset($manufacturingherosection) ? 'Edit' : 'Create' }} Manufacturing Hero</h3>

<form action="{{ isset($manufacturingherosection) 
? route('manufacturingherosection.update',$manufacturingherosection->id) 
: route('manufacturingherosection.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

@if(isset($manufacturingherosection))
@method('PUT')
@endif

<div class="mb-3">

<label>Hero Image</label>

<input type="file" name="image" class="form-control">

@if(isset($manufacturingherosection) && $manufacturingherosection->image)

<img src="{{ asset('storage/'.$manufacturingherosection->image) }}" width="200" class="mt-2">

@endif

</div>

<button class="btn btn-success">Save</button>

</form>

</div>

@endsection