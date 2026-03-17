@extends('admin.components.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">Research & Innovation</h1>

        <a href="{{ $data 
            ? route('manifacturing_research.edit', $data->id) 
            : route('manifacturing_research.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            {{ $data ? 'Edit Content' : 'Add Content' }}
        </a>
    </div>

    @if($data)
        <div class="bg-white shadow rounded p-6 space-y-4">

            <!-- Title -->
            <h2 class="text-2xl font-bold">
                {{ $data->title }}
            </h2>

            <!-- Image -->
            @if($data->image)
                <img src="{{ asset('storage/'.$data->image) }}"
                     class="w-48 h-auto rounded border">
            @endif

            <!-- Descriptions -->
            <div class="space-y-3">
                @foreach($data->descriptions ?? [] as $desc)
                    <p class="text-gray-700">{{ $desc }}</p>
                @endforeach
            </div>

        </div>
    @else
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
            No content added yet.
        </div>
    @endif

</div>
@endsection