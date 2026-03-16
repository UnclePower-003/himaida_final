@extends('admin.components.app')

@section('content')

<a href="{{ route('privatelabelling.create') }}" class="btn btn-primary mb-3">
Add Private Labelling
</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $item)

        <tr>
            <td>{{ $item->title }}</td>

            <td>
                <img src="{{ asset('storage/'.$item->image) }}" width="80">
            </td>

            <td>
                <a href="{{ route('privatelabelling.edit',$item->id) }}" class="btn btn-warning">
                    Edit
                </a>

                <form action="{{ route('privatelabelling.destroy',$item->id) }}" method="POST" style="display:inline;">
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