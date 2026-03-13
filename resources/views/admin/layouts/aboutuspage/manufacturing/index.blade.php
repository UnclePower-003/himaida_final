@extends('admin.components.app')

@section('content')

<div class="container">

    <a href="{{ route('manufacturing.create') }}" class="btn btn-primary mb-3">Add Manufacturing</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($manufacturings as $item)

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>

                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" width="80">
                    @endif
                </td>

                <td>

                    <a href="{{ route('manufacturing.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('manufacturing.destroy',$item->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>

                </td>

            </tr>

            @endforeach
        </tbody>
    </table>

</div>

@endsection