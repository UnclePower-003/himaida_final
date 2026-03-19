@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        {{ $product->exists ? 'Edit Product' : 'Add Product' }}
    </h1>

    @if ($errors->any())
        <div class="mb-5 rounded-lg bg-red-50 border border-red-300 text-red-700 px-4 py-3 text-sm space-y-1">
            @foreach ($errors->all() as $error)
                <p>• {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ $product->exists ? route('shilajit_products.update', $product) : route('shilajit_products.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white shadow rounded-xl p-6 space-y-6"
    >
        @csrf
        @if ($product->exists) @method('PUT') @endif

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"
                   placeholder="e.g. Himalayan Shilajit Trifala Mix">
        </div>

        {{-- Subtitle --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $product->subtitle) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"
                   placeholder="e.g. Iron Grade">
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
            <textarea name="description" rows="5"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"
                      placeholder="Product description...">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Product Image {{ $product->exists ? '' : '*' }}
            </label>

            @if ($product->exists && $product->image)
                <div class="mb-3">
                    <img src="{{ $product->image_url }}" alt="Current image"
                         class="w-40 h-40 object-contain border border-gray-200 rounded-lg p-1">
                    <p class="text-xs text-gray-400 mt-1">Current image. Upload a new one to replace it.</p>
                </div>
            @endif

            <input type="file" name="image" accept="image/*"
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
        </div>

        {{-- Image Alt --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image Alt Text</label>
            <input type="text" name="image_alt" value="{{ old('image_alt', $product->image_alt) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500"
                   placeholder="e.g. Shilajit Trifala Mix Iron Grade product">
        </div>

        {{-- Image Position --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image Position <span class="text-red-500">*</span></label>
            <select name="image_position"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                <option value="left"  {{ old('image_position', $product->image_position) === 'left'  ? 'selected' : '' }}>Left</option>
                <option value="right" {{ old('image_position', $product->image_position) === 'right' ? 'selected' : '' }}>Right</option>
            </select>
        </div>

        {{-- Active --}}
        <div class="flex items-center gap-3">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" id="is_active" name="is_active" value="1"
                   {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                   class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
            <label for="is_active" class="text-sm font-medium text-gray-700">Active (visible on frontend)</label>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition">
                {{ $product->exists ? 'Update Product' : 'Create Product' }}
            </button>
            <a href="{{ route('shilajit_products.index') }}"
               class="text-gray-500 hover:text-gray-700 text-sm font-medium">Cancel</a>
        </div>

    </form>
</div>
@endsection