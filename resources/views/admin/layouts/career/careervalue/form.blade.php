{{-- resources/views/admin/careervalue/form.blade.php --}}

@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-md">
    <form method="POST"
          action="{{ isset($value) ? route('careervalue.update',$value->id) : route('careervalue.store') }}"
          enctype="multipart/form-data">

        @csrf
        @if(isset($value)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" class="border p-1 w-full" value="{{ $value->title ?? '' }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Image</label>
            <input type="file" name="image" class="border p-1 w-full">
        </div>

        @if(isset($value) && $value->image)
            <img src="{{ asset('storage/'.$value->image) }}" width="150" class="mb-4">
        @endif

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            {{ isset($value) ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
@endsection