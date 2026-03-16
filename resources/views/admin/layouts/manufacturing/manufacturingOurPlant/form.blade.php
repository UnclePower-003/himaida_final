@extends('admin.components.app')

@section('content')

<div class="container">

<h3>{{ isset($manufacturingOurPlant) ? 'Edit' : 'Create' }} Manufacturing Plant</h3>

<form action="{{ isset($manufacturingOurPlant) 
? route('manufacturingOurPlant.update',$manufacturingOurPlant->id) 
: route('manufacturingOurPlant.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf
@if(isset($manufacturingOurPlant))
@method('PUT')
@endif

<div class="mb-3">
<label>Title</label>
<input type="text" name="title" class="form-control" value="{{ old('title',$manufacturingOurPlant->title ?? '') }}">
</div>

<div class="mb-3">
<label>Descriptions</label>
<div id="description-wrapper">

@if(isset($manufacturingOurPlant) && $manufacturingOurPlant->descriptions)
@foreach($manufacturingOurPlant->descriptions as $desc)
<div class="d-flex mb-2">
<input type="text" name="descriptions[]" class="form-control" value="{{ $desc }}">
<button type="button" class="btn btn-danger remove-description ms-2">X</button>
</div>
@endforeach
@else
<div class="d-flex mb-2">
<input type="text" name="descriptions[]" class="form-control">
<button type="button" class="btn btn-danger remove-description ms-2">X</button>
</div>
@endif

</div>
<button type="button" class="btn btn-primary mt-2" id="add-description">Add Description</button>
</div>

<div class="mb-3">
<label>Image</label>
<input type="file" name="image" class="form-control">
@if(isset($manufacturingOurPlant) && $manufacturingOurPlant->image)
<img src="{{ asset('storage/'.$manufacturingOurPlant->image) }}" width="200" class="mt-2">
@endif
</div>

<button class="btn btn-success">Save</button>

</form>

</div>

<script>
document.getElementById('add-description').onclick = function(){
    let wrapper = document.getElementById('description-wrapper');
    let html = `
    <div class="d-flex mb-2">
        <input type="text" name="descriptions[]" class="form-control">
        <button type="button" class="btn btn-danger remove-description ms-2">X</button>
    </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', html);
};

document.addEventListener('click', function(e){
    if(e.target.classList.contains('remove-description')){
        e.target.parentElement.remove();
    }
});
</script>

@endsection