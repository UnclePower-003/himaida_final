@extends('admin.components.app')

@section('title', ($hero->exists ?? false ? 'Edit' : 'Create') . ' Hero - Admin')

@section('content')
    @php
        $isEdit = $hero->exists ?? false;
        $action = $isEdit ? route('contactushero.update', $hero->id) : route('contactushero.store');
        $method = $isEdit ? 'PUT' : 'POST';
        $buttonText = $isEdit ? 'Update Hero' : 'Create Hero';
    @endphp

    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('contactushero.index') }}" class="text-blue-600 hover:text-blue-900 text-sm">&larr; Back to
                List</a>
            <h1 class="text-2xl font-bold text-gray-900 mt-2">{{ $isEdit ? 'Edit Hero' : 'Create Hero' }}</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6">
            @csrf
            @method($method)

            {{-- Title Line 1 --}}
            <div class="mb-4">
                <label for="title_line1" class="block text-sm font-medium text-gray-700 mb-1">Title (First Part)</label>
                <input type="text" name="title_line1" id="title_line1"
                    value="{{ old('title_line1', $hero->title_line1 ?? "LET'S ENHANCE") }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 border px-3 py-2">
            </div>

            {{-- Title Highlight --}}
            <div class="mb-4">
                <label for="title_highlight" class="block text-sm font-medium text-gray-700 mb-1">Title (Highlighted
                    Part)</label>
                <input type="text" name="title_highlight" id="title_highlight"
                    value="{{ old('title_highlight', $hero->title_highlight ?? 'LIVES') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 border px-3 py-2">
                <p class="text-xs text-gray-500 mt-1">This text will appear in your primary color</p>
            </div>

            {{-- Subtitle --}}
            <div class="mb-4">
                <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle"
                    value="{{ old('subtitle', $hero->subtitle ?? 'WITH OUR "WELLNESS" PRODUCTS TOGETHER') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 border px-3 py-2">
            </div>

            {{-- Background Image --}}
            <div class="mb-4">
                <label for="background_image" class="block text-sm font-medium text-gray-700 mb-1">Background Image</label>

                @if ($isEdit && $hero->background_image)
                    <div class="mb-3">
                        <img id="current-image" src="{{ asset('storage/' . $hero->background_image) }}" alt="Current"
                            class="h-32 object-cover rounded border">
                        <p class="text-xs text-gray-500 mt-1">Current image</p>
                    </div>
                @endif

                <input type="file" name="background_image" id="background_image" accept="image/*"
                    onchange="previewImage(event)"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image. Max 2MB (jpg, png, webp)</p>

                {{-- Live Preview --}}
                <div class="mt-2">
                    <img id="preview" class="h-32 object-cover rounded border hidden" alt="Preview">
                </div>
            </div>

            {{-- Is Active --}}
            <div class="mb-6">
                <label class="flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active', $hero->is_active ?? true) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 h-4 w-4">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium transition">
                    {{ $buttonText }}
                </button>
            </div>
        </form>
    </div>

    {{-- Live preview script --}}
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const currentImage = document.getElementById('current-image');

            const file = event.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
                if (currentImage) currentImage.classList.add('hidden');
            }
        }
    </script>
@endsection
