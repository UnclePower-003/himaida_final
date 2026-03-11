@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($data) ? 'Edit' : 'Create' }} Vision & Mission
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Craft the core purpose and future aspirations of your organization.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST"
                action="{{ isset($data) ? route('visionmission.update', $data->id) : route('visionmission.store') }}"
                enctype="multipart/form-data" class="space-y-10">

                @csrf
                @if (isset($data))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    {{-- Vision Section --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 pb-2 border-b border-gray-100">
                            <span class="p-2 bg-[#B11E38]/10 rounded-lg">
                                <svg class="w-5 h-5 text-[#B11E38]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </span>
                            <h3 class="text-xl font-bold text-gray-800">Vision</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Vision Title</label>
                            <input type="text" name="vision_title" placeholder="Where do we see ourselves?"
                                value="{{ $data->vision_title ?? '' }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Vision Icon</label>
                            @if (isset($data) && $data->vision_icon)
                                <img src="{{ asset('storage/' . $data->vision_icon) }}"
                                    class="w-12 h-12 mb-3 object-contain rounded bg-gray-50 p-1 border">
                            @endif
                            <input type="file" name="vision_icon"
                                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[11px] file:font-bold file:bg-[#B11E38]/10 file:text-[#B11E38] hover:file:bg-[#B11E38]/20 transition-colors">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Vision Description</label>
                            <textarea name="vision_description" rows="5"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                                placeholder="Detail the future state...">{{ $data->vision_description ?? '' }}</textarea>
                        </div>
                    </div>

                    {{-- Mission Section --}}
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 pb-2 border-b border-gray-100">
                            <span class="p-2 bg-[#B11E38]/10 rounded-lg">
                                <svg class="w-5 h-5 text-[#B11E38]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </span>
                            <h3 class="text-xl font-bold text-gray-800">Mission</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mission Title</label>
                            <input type="text" name="mission_title" placeholder="How will we get there?"
                                value="{{ $data->mission_title ?? '' }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mission Icon</label>
                            @if (isset($data) && $data->mission_icon)
                                <img src="{{ asset('storage/' . $data->mission_icon) }}"
                                    class="w-12 h-12 mb-3 object-contain rounded bg-gray-50 p-1 border">
                            @endif
                            <input type="file" name="mission_icon"
                                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[11px] file:font-bold file:bg-[#B11E38]/10 file:text-[#B11E38] hover:file:bg-[#B11E38]/20 transition-colors">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Mission Description</label>
                            <textarea name="mission_description" rows="5"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                                placeholder="Detail the daily commitment...">{{ $data->mission_description ?? '' }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 border-t border-gray-100">
                    <button type="submit"
                        class="w-full sm:w-auto px-12 py-3 bg-[#7CB80E] hover:bg-[#689a0c] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        Submit Updates
                    </button>

                    <a href="{{ route('visionmission.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
