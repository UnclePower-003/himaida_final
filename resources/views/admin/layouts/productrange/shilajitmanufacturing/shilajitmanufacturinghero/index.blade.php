@extends('admin.components.app')

@section('title', 'Shilajit Manufacturing Hero')

@section('content')
<div class="container mx-auto px-4 py-6">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Shilajit Manufacturing Hero</h1>
        <a href="{{ route('shilajit-manufacturing-hero.create') }}"
           class="bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition">
            + Add New
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">#</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Banner</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Title</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Highlighted Text</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Status</th>
                    <th class="px-4 py-3 text-left font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($heroes as $hero)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">
                        <img src="{{ $hero->desktop_banner_url }}"
                             alt="Banner"
                             class="w-24 h-14 object-cover rounded">
                    </td>
                    <td class="px-4 py-3 text-gray-800 font-medium">{{ $hero->title }}</td>
                    <td class="px-4 py-3 text-primaryText">{{ $hero->highlighted_text }}</td>
                    <td class="px-4 py-3">
                        @if($hero->is_active)
                            <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Active</span>
                        @else
                            <span class="inline-block px-2 py-1 text-xs bg-gray-100 text-gray-500 rounded-full">Inactive</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('shilajit-manufacturing-hero.edit', $hero) }}"
                               class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('shilajit-manufacturing-hero.destroy', $hero) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this hero section?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-gray-400">No hero sections found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $heroes->links() }}
    </div>

</div>
@endsection