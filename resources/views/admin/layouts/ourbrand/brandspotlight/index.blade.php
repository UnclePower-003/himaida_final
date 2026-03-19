@extends('admin.components.app')

@section('content')
    <div class="p-6">
        <a href="{{ route('brandspotlight.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
            Add Brand Spotlight
        </a>

        <table class="w-full border-collapse border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Image</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Active</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $brand)
                    <tr class="hover:bg-gray-50">
                        {{-- Brand Image --}}
                        <td class="p-2 border">
                            @if ($brand->brand_image)
                                <img src="{{ asset('storage/' . $brand->brand_image) }}"
                                    class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>

                        {{-- Title --}}
                        <td class="p-2 border">{{ $brand->title }}</td>

                        {{-- Active --}}
                        <td class="p-2 border">
                            @if ($brand->active)
                                <span class="px-2 py-1 bg-green-200 text-green-800 rounded">Yes</span>
                            @else
                                <span class="px-2 py-1 bg-red-200 text-red-800 rounded">No</span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('brandspotlight.edit', $brand->id) }}"
                                class="px-3 py-1 bg-yellow-400 rounded text-white">
                                Edit
                            </a>

                            <div>
                                <form action="{{ route('brandspotlight.destroy', $brand->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this brand?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $items->links() }}
        </div>
    </div>
@endsection
