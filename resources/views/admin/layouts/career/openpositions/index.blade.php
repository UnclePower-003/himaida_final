@extends('admin.components.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Open Positions</h2>
        <a href="{{ route('openpositions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Add New
        </a>
    </div>

    @foreach($positions as $position)
        <div class="border p-4 mb-3 rounded">
            <h3 class="font-semibold text-lg">{{ $position->title }}</h3>
            <p>{{ Str::limit($position->description, 100) }}</p>

            <div class="text-sm text-gray-500 mt-2">
                {{ $position->department }} | {{ $position->location }} | {{ $position->job_type }}
            </div>

            <div class="mt-3 flex gap-2">
                <a href="{{ route('openpositions.edit', $position) }}" class="text-blue-600">Edit</a>

                <form action="{{ route('openpositions.destroy', $position) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $positions->links() }}
</div>
@endsection