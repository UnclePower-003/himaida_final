@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">
        {{ $brand->exists ? 'Edit' : 'Create' }} Brand Spotlight
    </h2>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 p-3 rounded">
            <ul class="list-disc list-inside text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $brand->exists ? route('brandspotlight.update', $brand->id) : route('brandspotlight.store') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @if($brand->exists)
            @method('PUT')
        @endif

        {{-- Title --}}
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $brand->title) }}" 
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        {{-- Title Color (Hex Input) --}}
        <div class="mb-4">
            <label class="block mb-1">Title Color (Hex Code)</label>
            <input type="text" name="title_color" placeholder="#FFD700" 
                   value="{{ old('title_color', $brand->title_color ?? '#FFD700') }}" 
                   class="w-32 border px-2 py-1 rounded">
            <p class="text-sm text-gray-500 mt-1">Enter hex code like #FFD700</p>
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded" rows="5" required>{{ old('description', $brand->description) }}</textarea>
        </div>

        {{-- Brand Image --}}
        <div class="mb-4">
            <label class="block mb-1">Brand Image</label>
            <input type="file" name="brand_image" accept="image/*">
            @if($brand->brand_image)
                <img src="{{ asset('storage/'.$brand->brand_image) }}" class="w-32 mt-2">
            @endif
        </div>

        {{-- Circle Image --}}
        <div class="mb-4">
            <label class="block mb-1">Circle Image</label>
            <input type="file" name="circle_image" accept="image/*">
            @if($brand->circle_image)
                <img src="{{ asset('storage/'.$brand->circle_image) }}" class="w-32 mt-2 rounded-full">
            @endif
        </div>

        {{-- Product Tags --}}
        <div class="mb-4">
            <label class="block mb-1">Product Tags</label>
            <div id="tags-container">
                @if(old('tags', $brand->tags))
                    @foreach(old('tags', $brand->tags) as $tag)
                        <div class="flex mb-2 gap-2">
                            <input type="text" name="tags[]" value="{{ $tag }}" class="border px-2 py-1 rounded w-full">
                            <button type="button" onclick="this.parentNode.remove()" class="bg-red-500 text-white px-2 rounded">X</button>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addTag()" class="mt-2 px-3 py-1 bg-blue-600 text-white rounded">Add Tag</button>
        </div>

        {{-- Active --}}
        <div class="mb-4">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="active" value="1" {{ old('active', $brand->active) ? 'checked' : '' }}>
                Active
            </label>
        </div>

        {{-- Submit --}}
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
            {{ $brand->exists ? 'Update' : 'Create' }}
        </button>
    </form>
</div>

<script>
    function addTag() {
        const container = document.getElementById('tags-container');
        const div = document.createElement('div');
        div.className = 'flex mb-2 gap-2';
        div.innerHTML = `
            <input type="text" name="tags[]" class="border px-2 py-1 rounded w-full">
            <button type="button" onclick="this.parentNode.remove()" class="bg-red-500 text-white px-2 rounded">X</button>
        `;
        container.appendChild(div);
    }
</script>
@endsection