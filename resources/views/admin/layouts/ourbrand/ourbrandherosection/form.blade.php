@extends('admin.components.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">
        {{ $item->id ? 'Edit Hero Section' : 'Create Hero Section' }}
    </h2>

    <form method="POST"
        action="{{ $item->id ? route('ourbrandherosection.update', $item->id) : route('ourbrandherosection.store') }}"
        enctype="multipart/form-data"
        class="space-y-4">

        @csrf
        @if($item->id)
            @method('PUT')
        @endif

        <!-- Title Line 1 -->
        <div>
            <label>Title Line 1</label>
            <input type="text" name="title_line_1"
                value="{{ old('title_line_1', $item->title_line_1) }}"
                class="w-full border p-2">
        </div>

        <!-- Highlight 1 -->
        <div>
            <label>Highlight 1</label>
            <input type="text" name="highlight_1"
                value="{{ old('highlight_1', $item->highlight_1) }}"
                class="w-full border p-2">
        </div>

        <!-- Title Line 2 -->
        <div>
            <label>Title Line 2</label>
            <input type="text" name="title_line_2"
                value="{{ old('title_line_2', $item->title_line_2) }}"
                class="w-full border p-2">
        </div>

        <!-- Highlight 2 -->
        <div>
            <label>Highlight 2</label>
            <input type="text" name="highlight_2"
                value="{{ old('highlight_2', $item->highlight_2) }}"
                class="w-full border p-2">
        </div>

        <!-- Background Image -->
        <div>
            <label>Background Image</label>
            <input type="file" name="background_image" class="w-full border p-2">

            @if($item->background_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $item->background_image) }}"
                        class="h-24 rounded">
                </div>
            @endif
        </div>

        <!-- Active Checkbox -->
        <div>
            <label class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                Active
            </label>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $item->id ? 'Update' : 'Create' }}
            </button>
        </div>

    </form>

</div>
@endsection