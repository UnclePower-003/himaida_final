@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-5xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($data) ? 'Edit' : 'Create' }} "Who We Are" Section
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Manage your company history, milestone years, and brand storytelling imagery.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST" action="{{ isset($data) ? route('whoweare.update', $data->id) : route('whoweare.store') }}"
                enctype="multipart/form-data" class="space-y-8">

                @csrf
                @if (isset($data))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Title --}}
                    <div class="md:col-span-3">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Main Section Title</label>
                        <input type="text" name="title" placeholder="e.g. A Legacy of Innovation"
                            value="{{ $data->title ?? '' }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed">
                    </div>

                    {{-- Milestone Year Number --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Milestone Year (Number)</label>
                        <input type="text" name="year_number" placeholder="e.g. 25"
                            value="{{ $data->year_number ?? '' }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm">
                    </div>

                    {{-- Milestone Year Text --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Milestone Text</label>
                        <input type="text" name="year_text" placeholder="e.g. Years of Excellence"
                            value="{{ $data->year_text ?? '' }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm">
                    </div>

                    {{-- Descriptions --}}
                    <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-50">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Primary Description</label>
                            <textarea name="description1" rows="5" placeholder="Tell your primary story..."
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed">{{ $data->description1 ?? '' }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Secondary Description</label>
                            <textarea name="description2" rows="5" placeholder="Additional company details..."
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed">{{ $data->description2 ?? '' }}</textarea>
                        </div>
                    </div>

                    {{-- Images --}}
                    <div class="md:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-8 pt-6 border-t border-gray-50">
                        <div class="space-y-4">
                            <label class="block text-sm font-semibold text-gray-700">Primary Branding Image</label>
                            @if (isset($data) && $data->image1)
                                <div
                                    class="relative w-full h-40 bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
                                    <img src="{{ asset('uploads/whoweare/' . $data->image1) }}"
                                        class="w-full h-full object-cover">
                                    <div
                                        class="absolute top-2 right-2 px-2 py-1 bg-black/50 text-white text-[10px] font-bold rounded uppercase">
                                        Current</div>
                                </div>
                            @endif
                            <input type="file" name="image1"
                                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[11px] file:font-bold file:bg-[#B11E38]/10 file:text-[#B11E38] hover:file:bg-[#B11E38]/20 transition-colors">
                        </div>

                        <div class="space-y-4">
                            <label class="block text-sm font-semibold text-gray-700">Secondary / Lifestyle Image</label>
                            @if (isset($data) && $data->image2)
                                <div
                                    class="relative w-full h-40 bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
                                    <img src="{{ asset('uploads/whoweare/' . $data->image2) }}"
                                        class="w-full h-full object-cover">
                                    <div
                                        class="absolute top-2 right-2 px-2 py-1 bg-black/50 text-white text-[10px] font-bold rounded uppercase">
                                        Current</div>
                                </div>
                            @endif
                            <input type="file" name="image2"
                                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[11px] file:font-bold file:bg-[#B11E38]/10 file:text-[#B11E38] hover:file:bg-[#B11E38]/20 transition-colors">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-12 py-3 bg-[#7CB80E] hover:bg-[#689a0c] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#7CB80E]/50">
                        Save Changes
                    </button>

                    <button type="button" onclick="window.history.back()"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
