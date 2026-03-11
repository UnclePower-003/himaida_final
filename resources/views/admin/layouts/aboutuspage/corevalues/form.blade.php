@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($data) ? 'Edit' : 'Create' }} Core Value
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Update the foundational principles and iconography that represent your brand values.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST"
                action="{{ isset($data) ? route('corevalues.update', $data->id) : route('corevalues.store') }}"
                enctype="multipart/form-data" class="space-y-6">

                @csrf
                @if (isset($data))
                    @method('PUT')
                @endif

                {{-- Title Input --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Value Title</label>
                    <input type="text" name="title" placeholder="e.g. Integrity or Innovation"
                        value="{{ $data->title ?? '' }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        required>
                </div>

                {{-- Icon Upload --}}
                <div class="pt-4 border-t border-gray-50">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Value Icon</label>
                    <div class="flex items-center gap-6">
                        @if (isset($data->icon))
                            <div class="shrink-0 bg-gray-50 p-2 rounded-lg border border-gray-100">
                                <img src="{{ asset('uploads/corevalues/' . $data->icon) }}" class="w-16 h-16 object-contain">
                                <p class="text-[9px] text-center mt-1 text-gray-400 font-bold uppercase">Current</p>
                            </div>
                        @endif

                        <div class="grow">
                            <input type="file" name="icon"
                                class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2.5 file:px-4
                            file:rounded-full file:border-0
                            file:text-xs file:font-bold
                            file:bg-[#B11E38]/10 file:text-[#B11E38]
                            hover:file:bg-[#B11E38]/20 file:cursor-pointer transition-colors">
                            <p class="mt-2 text-[11px] text-gray-400 italic leading-relaxed">Recommended: SVG or PNG with
                                transparent background.</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-12 py-3 bg-[#7CB80E] hover:bg-[#689a0c] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        Save Value
                    </button>

                    <a href="{{ route('corevalues.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors text-sm">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
