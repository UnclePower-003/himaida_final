@extends('admin.components.app')

@section('content')

<div class="container">

<form method="POST"
action="{{ $item->id ? route('certificationcomponent.update',$item->id) : route('certificationcomponent.store') }}"
enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Certification Title</label>

<input type="text"
name="title"
class="form-control"
value="{{ old('title',$item->title) }}">
</div>

<div class="mb-3">

<label>Image</label>

<input type="file" name="image" class="form-control">

@if($item->image)
<img src="{{ asset('storage/'.$item->image) }}"
width="120"
class="mt-2">
@endif

</div>

<button class="btn btn-success">
{{ $item->id ? 'Update' : 'Create' }}
</button>

</form>

</div>

@endsection