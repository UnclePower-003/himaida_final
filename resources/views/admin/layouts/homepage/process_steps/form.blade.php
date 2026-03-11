@extends('admin.components.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        {{ isset($processStep) ? 'Edit Step' : 'Create Step' }}
    </h1>

    <form method="POST"
        action="{{ isset($processStep) ? route('process_steps.update', $processStep) : route('process_steps.store') }}"
        enctype="multipart/form-data">

        @csrf
        @isset($processStep)
            @method('PUT')
        @endisset

        <!-- Title -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" value="{{ old('title', $processStep->title ?? '') }}"
                class="w-full border p-2 rounded" required>
        </div>

        <!-- Position -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Position</label>
            <select name="position" class="w-full border p-2 rounded" required>
                <option value="top" {{ old('position', $processStep->position ?? '') == 'top' ? 'selected' : '' }}>Top
                </option>
                <option value="bottom" {{ old('position', $processStep->position ?? '') == 'bottom' ? 'selected' : '' }}>
                    Bottom</option>
            </select>
        </div>

        <!-- Icon Upload -->
        <div class="mb-4">
            <label class="block mb-1 font-medium">Icon Image</label>
            <input type="file" name="icon" accept=".svg,.png,.jpg,.jpeg,.webp" class="border p-2 rounded">

            @if (isset($processStep) && $processStep->icon)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $processStep->icon) }}" class="w-20 h-20 object-contain rounded shadow"
                        alt="Step Icon">
                </div>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Save</button>

    </form>
@endsection
