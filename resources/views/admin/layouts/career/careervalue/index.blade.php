{{-- resources/views/admin/careervalue/index.blade.php --}}

@extends('admin.components.app')

@section('content')
<div class="p-6">
    <a href="{{ route('careervalue.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Value</a>

    <table class="w-full mt-4 border border-gray-200">
        <thead>
            <tr>
                <th class="border px-2 py-1">ID</th>
                <th class="border px-2 py-1">Image</th>
                <th class="border px-2 py-1">Title</th>
                <th class="border px-2 py-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $value)
                <tr>
                    <td class="border px-2 py-1">{{ $value->id }}</td>
                    <td class="border px-2 py-1">
                        @if($value->image)
                            <img src="{{ asset('storage/'.$value->image) }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="border px-2 py-1">{{ $value->title }}</td>
                    <td class="border px-2 py-1 flex gap-2">
                        <a href="{{ route('careervalue.edit',$value->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('careervalue.destroy',$value->id) }}" method="POST">
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