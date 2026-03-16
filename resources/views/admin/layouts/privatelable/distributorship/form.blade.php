@extends('admin.components.app')

@section('content')

<form method="POST"
      action="{{ isset($data) ? route('distributorship.update', $data->id) : route('distributorship.store') }}"
      enctype="multipart/form-data">

@csrf
@if(isset($data))
    @method('PUT')
@endif

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ $data->title ?? '' }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $data->description ?? '' }}</textarea>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image">
</div>

<h4>Bullet Points</h4>
<div id="points-wrapper">
    @if(isset($data) && !empty($data->points))
        @foreach($data->points as $point)
            <div class="flex mb-2">
                <input type="text" name="points[]" value="{{ $point }}" class="form-control flex-1">
                <button type="button" onclick="removePoint(this)" class="ml-2 btn btn-danger">×</button>
            </div>
        @endforeach
    @endif
</div>
<button type="button" onclick="addPoint()" class="btn btn-secondary mb-3">Add Point</button>

<h4>Contact / Support Items</h4>
<div id="contacts-wrapper">
    @if(isset($data) && !empty($data->contacts))
        @foreach($data->contacts as $contact)
            <div class="flex mb-2 items-center">
                <input type="file" name="contact_icon[]" class="mr-2" accept="image/*">
                <input type="text" name="contact_text[]" value="{{ $contact['text'] ?? '' }}" placeholder="Text" class="form-control mr-2">
                <button type="button" onclick="removeContact(this)" class="btn btn-danger">×</button>
            </div>
        @endforeach
    @endif
</div>
<button type="button" onclick="addContact()" class="btn btn-secondary mb-3">Add Contact</button>

<br>
<button class="btn btn-success">Save</button>

</form>

<script>
function addPoint() {
    let html = `
    <div class="flex mb-2">
        <input type="text" name="points[]" class="form-control flex-1">
        <button type="button" onclick="removePoint(this)" class="ml-2 btn btn-danger">×</button>
    </div>`;
    document.getElementById('points-wrapper').insertAdjacentHTML('beforeend', html);
}

function removePoint(btn) {
    btn.parentElement.remove();
}

function addContact() {
    let html = `
    <div class="flex mb-2 items-center">
        <input type="file" name="contact_icon[]" class="mr-2" accept="image/*">
        <input type="text" name="contact_text[]" placeholder="Text" class="form-control mr-2">
        <input type="text" name="contact_link[]" placeholder="Link" class="form-control mr-2">
        <button type="button" onclick="removeContact(this)" class="btn btn-danger">×</button>
    </div>`;
    document.getElementById('contacts-wrapper').insertAdjacentHTML('beforeend', html);
}

function removeContact(btn) {
    btn.parentElement.remove();
}
</script>

@endsection