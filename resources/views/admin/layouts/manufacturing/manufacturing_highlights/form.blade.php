@extends('admin.components.app')

@section('content')
<div class="p-6">

    <form method="POST"
        action="{{ isset($highlight) 
            ? route('manufacturing_highlights.update', $highlight->id) 
            : route('manufacturing_highlights.store') }}">

        @csrf
        @if(isset($highlight))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="w-full border p-2" required>
                {{ $highlight->description ?? '' }}
            </textarea>
        </div>

        <div class="mb-4">
            <label>Column</label>
            <select name="column" class="w-full border p-2">
                <option value="left" {{ (isset($highlight) && $highlight->column == 'left') ? 'selected' : '' }}>Left</option>
                <option value="right" {{ (isset($highlight) && $highlight->column == 'right') ? 'selected' : '' }}>Right</option>
            </select>
        </div>

        <div class="mb-4">
            <label>Order</label>
            <input type="number" name="order"
                   value="{{ $highlight->order ?? 0 }}"
                   class="w-full border p-2">
        </div>

        <button class="bg-green-500 text-white px-4 py-2">
            {{ isset($highlight) ? 'Update' : 'Create' }}
        </button>

    </form>
</div>
@endsection