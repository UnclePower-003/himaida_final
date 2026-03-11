@extends('admin.components.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Process Steps</h1>

    <a href="{{ route('process_steps.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded mb-5 inline-block">
        + Add Step
    </a>

    <div class="bg-white shadow rounded overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Title</th>
                    <th class="p-3">Position</th>
                    <th class="p-3">Icon</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($steps as $step)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $step->id }}</td>
                        <td class="p-3 font-medium">{{ $step->title }}</td>
                        <td class="p-3">
                            <span
                                class="px-3 py-1 text-sm rounded-full
                            {{ $step->position == 'top' ? 'bg-red-100 text-red-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ ucfirst($step->position) }}
                            </span>
                        </td>
                        <td class="p-3">
                            @if ($step->icon)
                                <img src="{{ asset('storage/' . $step->icon) }}" class="w-12 h-12 object-contain rounded">
                            @else
                                <span class="text-gray-400">No Icon</span>
                            @endif
                        </td>
                        <td class="p-3 text-right space-x-3">
                            <a href="{{ route('process_steps.edit', $step) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('process_steps.destroy', $step) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this step?')"
                                    class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">No steps found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
