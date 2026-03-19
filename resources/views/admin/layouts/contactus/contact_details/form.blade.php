@extends('admin.components.app')

@section('content')
<div class="p-6">

    <form method="POST"
        action="{{ $contact->exists 
            ? route('contact_details.update', $contact->id) 
            : route('contact_details.store') }}"
        enctype="multipart/form-data">

        @csrf
        @if($contact->exists)
            @method('PUT')
        @endif

        {{-- Label --}}
        <div class="mb-4">
            <label class="block mb-1">Label</label>
            <input type="text" name="label"
                value="{{ old('label', $contact->label) }}"
                class="border w-full p-2">
        </div>

        {{-- Value --}}
        <div class="mb-4">
            <label class="block mb-1">Value</label>
            <input type="text" name="value"
                value="{{ old('value', $contact->value) }}"
                class="border w-full p-2" required>
        </div>

        {{-- Icon --}}
        <div class="mb-4">
            <label class="block mb-1">Icon (Image)</label>
            <input type="file" name="icon" class="block">

            @if($contact->icon)
                <img src="{{ asset('storage/'.$contact->icon) }}"
                     class="w-12 mt-2">
            @endif
        </div>

        {{-- Active Checkbox --}}
        <div class="mb-4">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $contact->is_active) ? 'checked' : '' }}>
                <span>Active</span>
            </label>
        </div>

        {{-- Submit --}}
        <button class="bg-green-600 text-white px-4 py-2">
            {{ $contact->exists ? 'Update' : 'Create' }}
        </button>

    </form>

</div>
@endsection