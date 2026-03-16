@extends('admin.components.app')

@section('content')

<div class="p-6">

<a href="{{ route('privatelablehero.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">
Add Hero
</a>

<table class="w-full mt-6 border">

<thead class="bg-gray-100">
<tr>
<th class="p-3">Image</th>
<th class="p-3">Title</th>
<th class="p-3">Subtitle</th>
<th class="p-3">Action</th>
</tr>
</thead>

<tbody>

@foreach($heroes as $hero)

<tr class="border-t">

<td class="p-3">
<img src="{{ asset('storage/'.$hero->image) }}" class="h-16">
</td>

<td class="p-3">{{ $hero->title }}</td>

<td class="p-3">{{ $hero->subtitle }}</td>

<td class="p-3 flex gap-2">

<a href="{{ route('privatelablehero.edit',$hero->id) }}"
class="bg-yellow-500 text-white px-3 py-1 rounded">
Edit
</a>

<form action="{{ route('privatelablehero.destroy',$hero->id) }}"
method="POST">

@csrf
@method('DELETE')

<button class="bg-red-600 text-white px-3 py-1 rounded">
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