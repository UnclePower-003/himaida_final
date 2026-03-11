@extends('admin.components.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-bold mb-4">
        {{ isset($faq) ? 'Edit FAQ' : 'Create FAQ' }}
    </h2>

    <form method="POST"
          action="{{ isset($faq) ? route('faq.update', $faq) : route('faq.store') }}">

        @csrf
        @if(isset($faq))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block mb-1 font-medium">Question</label>
            <input type="text"
                   name="question"
                   value="{{ old('question', $faq->question ?? '') }}"
                   class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Answer</label>
            <textarea name="answer"
                      rows="5"
                      class="w-full border p-2 rounded">{{ old('answer', $faq->answer ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox"
                       name="is_active"
                       class="mr-2"
                       {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
                Active
            </label>
        </div>

        <button class="bg-green-600 text-white px-6 py-2 rounded">
            {{ isset($faq) ? 'Update' : 'Create' }}
        </button>

    </form>

</div>
@endsection 