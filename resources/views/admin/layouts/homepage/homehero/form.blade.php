@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ $homehero->exists ? 'Edit Home Hero' : 'Add New Home Hero' }}
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Configure the main banner settings for your website's landing page.
            </p>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-600 text-red-800 rounded-r-lg shadow-sm text-sm">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-bold">Please correct the following:</span>
                </div>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form action="{{ $homehero->exists ? route('homehero.update', $homehero->id) : route('homehero.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if ($homehero->exists)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Heading --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Heading *</label>
                        <input type="text" name="heading" value="{{ old('heading', $homehero->heading) }}" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                            placeholder="e.g. Premium Home Collection">
                    </div>

                    {{-- Subheading --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subheading *</label>
                        <textarea name="subheading" rows="3" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                            placeholder="Describe the collection details...">{{ old('subheading', $homehero->subheading) }}</textarea>
                    </div>

                    {{-- Button Text --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Button Text *</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $homehero->button_text) }}"
                            required
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm"
                            placeholder="e.g. Shop Now">
                    </div>

                    {{-- Button Link --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Button Link (Optional)</label>
                        <input type="url" name="button_link" value="{{ old('button_link', $homehero->button_link) }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm"
                            placeholder="https://example.com">
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="pt-4 border-t border-gray-50">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Hero Image
                        {{ $homehero->exists ? '' : '*' }}</label>

                    <div class="flex items-center space-x-6">
                        @if ($homehero->image)
                            <div class="shrink-0">
                                <img src="{{ asset('storage/' . $homehero->image) }}"
                                    class="h-24 w-40 object-cover rounded-lg shadow-sm border border-gray-200">
                            </div>
                        @endif
                        <label class="block w-full">
                            <span class="sr-only">Choose File</span>
                            <input type="file" name="image" {{ $homehero->exists ? '' : 'required' }}
                                class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2.5 file:px-4
                            file:rounded-full file:border-0
                            file:text-xs file:font-bold
                            file:bg-[#B11E38]/10 file:text-[#B11E38]
                            hover:file:bg-[#B11E38]/20 file:cursor-pointer transition-colors">
                        </label>
                    </div>
                    <p class="mt-3 text-xs text-gray-400 italic">High-resolution landscape images (1920x800px) are
                        recommended.</p>
                </div>

                {{-- Submit & Actions --}}
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 bg-[#B11E38] hover:bg-[#8E182D] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        {{ $homehero->exists ? 'Update Hero' : 'Create Hero' }}
                    </button>

                    <a href="{{ route('homehero.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Cancel & Go Back
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
