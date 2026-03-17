{{-- resources/views/admin/careerhero/form.blade.php --}}

@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-md">
    <form method="POST"
          action="{{ isset($hero) ? route('careerhero.update',$hero->id) : route('careerhero.store') }}"
          enctype="multipart/form-data">

        @csrf
        @if(isset($hero)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block mb-1">Image</label>
            <input type="file" name="image" class="border p-1 w-full">
        </div>

        @if(isset($hero) && $hero->image)
            <img src="{{ asset('storage/'.$hero->image) }}" width="200" class="mb-4">
        @endif

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            {{ isset($hero) ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
@endsection