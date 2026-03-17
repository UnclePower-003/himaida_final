@extends('admin.components.app')

@section('content')
<div class="p-6">
    <a href="{{ route('manufacturing_highlights.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">Add New</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Column</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($highlights as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->column }}</td>
                    <td>{{ $item->order }}</td>
                    <td>
                        <a href="{{ route('manufacturing_highlights.edit', $item->id) }}">Edit</a>

                        <form action="{{ route('manufacturing_highlights.destroy', $item->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection