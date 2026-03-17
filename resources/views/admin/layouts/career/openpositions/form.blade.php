@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-xl">

    <h2 class="text-xl font-bold mb-4">
        {{ $position->exists ? 'Edit Position' : 'Create Position' }}
    </h2>

    <form method="POST"
        action="{{ $position->exists ? route('openpositions.update', $position) : route('openpositions.store') }}">

        @csrf
        @if($position->exists) @method('PUT') @endif

        <input type="text" name="title" placeholder="Title"
            value="{{ old('title', $position->title) }}" class="w-full border p-2 mb-3">

        <textarea name="description" placeholder="Description"
            class="w-full border p-2 mb-3">{{ old('description', $position->description) }}</textarea>

        <input type="text" name="department" placeholder="Department"
            value="{{ old('department', $position->department) }}" class="w-full border p-2 mb-3">

        <input type="text" name="location" placeholder="Location"
            value="{{ old('location', $position->location) }}" class="w-full border p-2 mb-3">

        <input type="text" name="job_type" placeholder="Job Type"
            value="{{ old('job_type', $position->job_type) }}" class="w-full border p-2 mb-3">

        <input type="text" name="apply_link" placeholder="Apply Link"
            value="{{ old('apply_link', $position->apply_link) }}" class="w-full border p-2 mb-3">

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Save
        </button>

    </form>
</div>
@endsection