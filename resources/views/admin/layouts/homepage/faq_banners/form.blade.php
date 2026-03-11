@extends('admin.components.app')

@section('content')

<div class="p-6">

<h2 class="text-xl font-bold mb-4">
    {{ $banner->id ? 'Edit Banner' : 'Create Banner' }}
</h2>

<form
action="{{ $banner->id ? route('faq_banners.update',$banner->id) : route('faq_banners.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf
@if($banner->id)
@method('PUT')
@endif


<div class="mb-4">
    <label class="block mb-1">Title</label>

    <input type="text"
           name="title"
           value="{{ old('title',$banner->title) }}"
           class="w-full border p-2 rounded">
</div>


<div class="mb-4">
    <label class="block mb-1">Image</label>

    <input type="file" name="image">

    @if($banner->image)
        <img src="{{ asset('storage/'.$banner->image) }}"
             class="w-40 mt-3">
    @endif
</div>


<button class="bg-green-600 text-white px-6 py-2 rounded">
    Save
</button>

</form>

</div>

@endsection