@extends('admin.components.app')

@section('content')

<div class="container">

<a href="{{ route('contract_manufacturing.create') }}" class="btn btn-primary mb-3">
Add Contract Manufacturing
</a>

<table class="table table-bordered">

<tr>
<th>Title</th>
<th>Image</th>
<th>Action</th>
</tr>

@foreach($contracts as $item)

<tr>

<td>{{ $item->title }}</td>

<td>
@if($item->image)
<img src="{{ asset('storage/'.$item->image) }}" width="80">
@endif
</td>

<td>

<a href="{{ route('contract_manufacturing.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('contract_manufacturing.destroy',$item->id) }}" method="POST" style="display:inline">

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