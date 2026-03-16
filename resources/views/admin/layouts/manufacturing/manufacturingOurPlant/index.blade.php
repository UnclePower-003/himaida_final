@extends('admin.components.app')

@section('content')

<div class="container">

<a href="{{ route('manufacturingOurPlant.create') }}" class="btn btn-primary mb-3">Add Plant Section</a>

<table class="table table-bordered">

<tr>
<th>Title</th>
<th>Image</th>
<th>Action</th>
</tr>

@foreach($plants as $plant)
<tr>
<td>{{ $plant->title }}</td>
<td>
@if($plant->image)
<img src="{{ asset('storage/'.$plant->image) }}" width="120">
@endif
</td>
<td>
<a href="{{ route('manufacturingOurPlant.edit',$plant->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('manufacturingOurPlant.destroy',$plant->id) }}" method="POST" style="display:inline">
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