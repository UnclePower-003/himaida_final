@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-4xl">

    <h1 class="text-xl font-semibold mb-6">
        {{ isset($data) ? 'Edit' : 'Create' }} Research & Innovation
    </h1>

    <form method="POST" enctype="multipart/form-data"
        action="{{ isset($data) 
            ? route('manifacturing_research.update', $data->id)
            : route('manifacturing_research.store') }}">

        @csrf
        @if(isset($data)) @method('PUT') @endif

        <!-- Title -->
        <div class="mb-5">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title"
                value="{{ old('title', $data->title ?? '') }}"
                class="w-full border rounded p-2">
        </div>

        <!-- Image -->
        <div class="mb-5">
            <label class="block mb-1 font-medium">Image</label>
            <input type="file" name="image" class="w-full border rounded p-2">

            @if(isset($data) && $data->image)
                <img src="{{ asset('storage/'.$data->image) }}"
                     class="w-32 mt-3 border rounded">
            @endif
        </div>

        <!-- Descriptions -->
        <div class="mb-5">
            <label class="block mb-2 font-medium">Descriptions</label>

            <div id="desc-wrapper">
                @if(old('descriptions'))
                    @foreach(old('descriptions') as $desc)
                        <div class="flex gap-2 mb-2">
                            <textarea name="descriptions[]" class="w-full border rounded p-2">{{ $desc }}</textarea>
                            <button type="button" onclick="removeField(this)" class="text-red-500">✕</button>
                        </div>
                    @endforeach
                @elseif(isset($data) && $data->descriptions)
                    @foreach($data->descriptions as $desc)
                        <div class="flex gap-2 mb-2">
                            <textarea name="descriptions[]" class="w-full border rounded p-2">{{ $desc }}</textarea>
                            <button type="button" onclick="removeField(this)" class="text-red-500">✕</button>
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="button" onclick="addField()"
                class="mt-3 bg-gray-800 text-white px-3 py-1 rounded">
                + Add Paragraph
            </button>
        </div>

        <!-- Submit -->
        <button class="bg-green-600 text-white px-5 py-2 rounded">
            {{ isset($data) ? 'Update' : 'Save' }}
        </button>

    </form>

</div>

<script>
function addField() {
    document.getElementById('desc-wrapper').insertAdjacentHTML('beforeend', `
        <div class="flex gap-2 mb-2">
            <textarea name="descriptions[]" class="w-full border rounded p-2"></textarea>
            <button type="button" onclick="removeField(this)" class="text-red-500">✕</button>
        </div>
    `);
}

function removeField(btn) {
    btn.parentElement.remove();
}
</script>
@endsection