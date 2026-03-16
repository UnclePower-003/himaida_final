@extends('admin.components.app')

@section('content')

<a href="{{ route('distributorship.create') }}" class="btn btn-primary mb-3">Add Distributorship</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" width="80">
                    @endif
                </td>
                <td>
                    {{ $item->contact_number }} <br> {{ $item->contact_email }}
                </td>
                <td>
                    <a href="{{ route('distributorship.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('distributorship.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection