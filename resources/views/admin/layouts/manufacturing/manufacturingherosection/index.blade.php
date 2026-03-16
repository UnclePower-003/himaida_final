@extends('admin.components.app')

@section('content')

<div class="container">

<a href="{{ route('manufacturingherosection.create') }}" class="btn btn-primary mb-3">
Add Hero
</a>

<table class="table table-bordered">

<tr>
<th>Image</th>
<th>Action</th>
</tr>

@foreach($items as $item)

<tr>

<td>
<img src="{{ asset('storage/'.$item->image) }}" width="150">
</td>

<td>

<a href="{{ route('manufacturingherosection.edit',$item->id) }}" class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('manufacturingherosection.destroy',$item->id) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">Delete</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

@endsection