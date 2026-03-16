@extends('admin.components.app')

@section('content')

<div class="p-6 max-w-xl">

<form
action="{{ isset($hero) ? route('privatelablehero.update',$hero->id) : route('privatelablehero.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

@if(isset($hero))
@method('PUT')
@endif


<div class="mb-4">
<label class="block mb-1">Title</label>
<input type="text"
name="title"
value="{{ $hero->title ?? '' }}"
class="w-full border p-2">
</div>


<div class="mb-4">
<label class="block mb-1">Highlight Text</label>
<input type="text"
name="highlight_text"
value="{{ $hero->highlight_text ?? '' }}"
class="w-full border p-2">
</div>


<div class="mb-4">
<label class="block mb-1">Subtitle</label>
<input type="text"
name="subtitle"
value="{{ $hero->subtitle ?? '' }}"
class="w-full border p-2">
</div>


<div class="mb-4">
<label class="block mb-1">Image</label>
<input type="file" name="image" class="w-full border p-2">
</div>

@if(isset($hero))
<img src="{{ asset('storage/'.$hero->image) }}" class="h-20 mb-4">
@endif


<button class="bg-green-600 text-white px-4 py-2 rounded">
Save
</button>

</form>

</div>

@endsection