@extends('admin.components.app')

@section('title', $hero->exists ? 'Edit Hero Section' : 'Create Hero Section')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-3xl">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('shilajit-manufacturing-hero.index') }}"
           class="text-gray-500 hover:text-gray-700 text-sm">← Back</a>
        <h1 class="text-2xl font-semibold text-gray-800">
            {{ $hero->exists ? 'Edit Hero Section' : 'Create Hero Section' }}
        </h1>
    </div>

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-50 text-red-700 rounded">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ $hero->exists
            ? route('shilajit-manufacturing-hero.update', $hero)
            : route('shilajit-manufacturing-hero.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-lg shadow p-6 space-y-6"
    >
        @csrf
        @if($hero->exists)
            @method('PUT')
        @endif

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                Title <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $hero->title) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('title') border-red-400 @enderror"
                placeholder="Pure Himalayan Shilajit"
            >
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Highlighted Text --}}
        <div>
            <label for="highlighted_text" class="block text-sm font-medium text-gray-700 mb-1">
                Highlighted Text <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="highlighted_text"
                name="highlighted_text"
                value="{{ old('highlighted_text', $hero->highlighted_text) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary @error('highlighted_text') border-red-400 @enderror"
                placeholder="Unfiltered Strength"
            >
            @error('highlighted_text')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Banner Images --}}
        @foreach([
            ['field' => 'banner_desktop', 'label' => 'Desktop Banner'],
            ['field' => 'banner_tablet',  'label' => 'Tablet Banner'],
            ['field' => 'banner_mobile',  'label' => 'Mobile Banner'],
        ] as $banner)
        <div>
            <label for="{{ $banner['field'] }}" class="block text-sm font-medium text-gray-700 mb-1">
                {{ $banner['label'] }}
                <span class="text-gray-400 font-normal">(jpg, png, webp — max 4MB)</span>
            </label>

            @if($hero->exists && $hero->{$banner['field']})
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $hero->{$banner['field']}) }}"
                         alt="{{ $banner['label'] }}"
                         class="h-24 rounded border object-cover">
                    <p class="text-xs text-gray-400 mt-1">Current image — upload a new one to replace.</p>
                </div>
            @endif

            <input
                type="file"
                id="{{ $banner['field'] }}"
                name="{{ $banner['field'] }}"
                accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 @error($banner['field']) border border-red-400 rounded @enderror"
            >
            @error($banner['field'])
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        @endforeach

        {{-- Active Status --}}
        <div class="flex items-center gap-3">
            <input
                type="checkbox"
                id="is_active"
                name="is_active"
                value="1"
                {{ old('is_active', $hero->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary"
            >
            <label for="is_active" class="text-sm font-medium text-gray-700">
                Set as Active Hero
            </label>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3 pt-2">
            <button
                type="submit"
                class="bg-primary text-white px-6 py-2 rounded hover:bg-primary/90 transition text-sm font-medium"
            >
                {{ $hero->exists ? 'Update Hero' : 'Create Hero' }}
            </button>
            <a href="{{ route('shilajit-manufacturing-hero.index') }}"
               class="text-sm text-gray-500 hover:underline">Cancel</a>
        </div>

    </form>
</div>
@endsection