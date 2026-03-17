{{-- resources/views/admin/careerhero/index.blade.php --}}

@extends('admin.components.app')

@section('content')
<div class="p-6">
    <a href="{{ route('careerhero.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Hero</a>

    <table class="w-full mt-4 border border-gray-200">
        <thead>
            <tr>
                <th class="border px-2 py-1">ID</th>
                <th class="border px-2 py-1">Image</th>
                <th class="border px-2 py-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($heroes as $hero)
                <tr>
                    <td class="border px-2 py-1">{{ $hero->id }}</td>
                    <td class="border px-2 py-1">
                        @if($hero->image)
                            <img src="{{ asset('storage/'.$hero->image) }}" width="100">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="border px-2 py-1 flex gap-2">
                        <a href="{{ route('careerhero.edit',$hero->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('careerhero.destroy',$hero->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection