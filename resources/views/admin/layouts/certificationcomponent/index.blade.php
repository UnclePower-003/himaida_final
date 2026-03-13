@extends('admin.components.app')

@section('content')

<div class="container">

<a href="{{ route('certificationcomponent.create') }}" class="btn btn-primary mb-3">
Add Certification
</a>

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Image</th>
<th>Title</th>
<th width="150">Action</th>
</tr>
</thead>

<tbody>

@foreach($items as $item)

<tr>

<td>{{ $item->id }}</td>

<td>
@if($item->image)
<img src="{{ asset('storage/'.$item->image) }}" width="80">
@endif
</td>

<td>{{ $item->title }}</td>

<td>

<a href="{{ route('certificationcomponent.edit',$item->id) }}"
class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('certificationcomponent.destroy',$item->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection