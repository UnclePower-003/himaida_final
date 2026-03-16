@extends('admin.components.app')

@section('content')
    <div class="container">

        <form method="POST"
            action="{{ $manufacturing->id ? route('manufacturing.update', $manufacturing->id) : route('manufacturing.store') }}"
            enctype="multipart/form-data">

            @csrf
            @if ($manufacturing->id)
                @method('PUT') {{-- Method spoofing for update --}}
            @endif

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $manufacturing->title) }}">
            </div>

            <div class="mb-3">
                <label>Top Text</label>
                <input type="text" name="top_text" class="form-control"
                    value="{{ old('top_text', $manufacturing->top_text) }}">
            </div>

            <div class="mb-3">
                <label>Bottom Text</label>
                <input type="text" name="bottom_text" class="form-control"
                    value="{{ old('bottom_text', $manufacturing->bottom_text) }}">
            </div>

            <div class="mb-3">
                <label>Description One</label>
                <textarea name="description_one" class="form-control">{{ old('description_one', $manufacturing->description_one) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Description Two</label>
                <textarea name="description_two" class="form-control">{{ old('description_two', $manufacturing->description_two) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">

                @if ($manufacturing->image)
                    <img src="{{ asset('storage/' . $manufacturing->image) }}" width="120" class="mt-2">
                @endif
            </div>

            <button class="btn btn-success">
                {{ $manufacturing->id ? 'Update' : 'Create' }}
            </button>

        </form>

    </div>
@endsection
    