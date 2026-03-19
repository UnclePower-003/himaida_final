@extends('admin.components.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Hero Sections</h2>

    <a href="{{ route('ourbrandherosection.create') }}"
        class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
        + Add New
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Image</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Active</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($items as $item)
                <tr>
                    <!-- Image -->
                    <td class="p-2 border">
                        @if($item->background_image)
                            <img src="{{ asset('storage/' . $item->background_image) }}"
                                class="h-16 rounded">
                        @else
                            No Image
                        @endif
                    </td>

                    <!-- Title -->
                    <td class="p-2 border">
                        {{ $item->title_line_1 }}
                        <strong>{{ $item->highlight_1 }}</strong>
                        <br>
                        {{ $item->title_line_2 }}
                        <strong>{{ $item->highlight_2 }}</strong>
                    </td>

                    <!-- Status -->
                    <td class="p-2 border">
                        <span class="{{ $item->is_active ? 'text-green-600' : 'text-red-600' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="p-2 border space-x-2">
                        <a href="{{ route('ourbrandherosection.edit', $item->id) }}"
                            class="text-blue-600">Edit</a>

                        <form action="{{ route('ourbrandherosection.destroy', $item->id) }}"
                            method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Are you sure?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4">
                        No data found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $items->links() }}
    </div>

</div>
@endsection