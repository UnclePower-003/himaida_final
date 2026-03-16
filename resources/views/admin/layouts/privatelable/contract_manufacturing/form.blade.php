@extends('admin.components.app')

@section('content')

<div class="container">

<h3>{{ isset($contractManufacturing) ? 'Edit' : 'Create' }} Contract Manufacturing</h3>

<form action="{{ isset($contractManufacturing) ? route('contract_manufacturing.update',$contractManufacturing->id) : route('contract_manufacturing.store') }}" method="POST" enctype="multipart/form-data">

@csrf
@if(isset($contractManufacturing))
@method('PUT')
@endif


<div class="mb-3">
<label>Title</label>
<input type="text" name="title" class="form-control"
value="{{ old('title',$contractManufacturing->title ?? '') }}">
</div>


<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control" rows="4">{{ old('description',$contractManufacturing->description ?? '') }}</textarea>
</div>


<div class="mb-3">

<label>Points</label>

<div id="points-wrapper">

@if(isset($contractManufacturing) && $contractManufacturing->points)

@foreach($contractManufacturing->points as $point)

<div class="d-flex mb-2 point-row">

<input type="text" name="points[]" class="form-control me-2" value="{{ $point }}">

<button type="button" class="btn btn-danger remove-point">X</button>

</div>

@endforeach

@else

<div class="d-flex mb-2 point-row">

<input type="text" name="points[]" class="form-control me-2">

<button type="button" class="btn btn-danger remove-point">X</button>

</div>

@endif

</div>

<button type="button" class="btn btn-sm btn-primary mt-2" id="add-point">+ Add Point</button>

</div>


<div class="mb-3">

<label>Image</label>

<input type="file" name="image" class="form-control">

@if(isset($contractManufacturing) && $contractManufacturing->image)

<img src="{{ asset('storage/'.$contractManufacturing->image) }}" width="120" class="mt-2">

@endif

</div>


<button class="btn btn-success">Save</button>

</form>

</div>



<script>

document.getElementById('add-point').onclick=function(){

let html=`
<div class="d-flex mb-2 point-row">
<input type="text" name="points[]" class="form-control me-2">
<button type="button" class="btn btn-danger remove-point">X</button>
</div>
`;

document.getElementById('points-wrapper').insertAdjacentHTML('beforeend',html);

};

document.addEventListener('click',function(e){

if(e.target.classList.contains('remove-point')){
e.target.closest('.point-row').remove();
}

});

</script>

@endsection