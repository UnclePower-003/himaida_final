@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($service) ? 'Edit Service' : 'Create Service' }}
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Configure the service details and decide if it should be highlighted as a featured offering.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST" action="{{ isset($service) ? route('services.update', $service) : route('services.store') }}"
                enctype="multipart/form-data" class="space-y-6">

                @csrf
                @isset($service)
                    @method('PUT')
                @endisset

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Title --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Service Title</label>
                        <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}"
                            class="w-full px-4 py-3 rounded-lg border @error('title') border-red-500 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                            placeholder="e.g. Interior Design Consulting" required>
                        @error('title')
                            <p class="text-red-500 text-[11px] mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Subtitle --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 text-stone-800">Subtitle
                            Accents</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $service->subtitle ?? '') }}"
                            class="w-full px-4 py-3 rounded-lg border @error('subtitle') border-red-500 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm"
                            placeholder="Brief catchy phrase">
                        @error('subtitle')
                            <p class="text-red-500 text-[11px] mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea name="description"
                            class="w-full px-4 py-3 rounded-lg border @error('description') border-red-500 @else border-gray-200 @enderror focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                            rows="5" placeholder="Detailed service breakdown...">{{ old('description', $service->description ?? '') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-[11px] mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div class="md:col-span-2 pt-4 border-t border-gray-50">
                        <label class="block text-sm font-semibold text-gray-700 mb-4">Service Imagery</label>
                        <div class="flex items-start gap-6">
                            @if (isset($service) && $service->image)
                                <div class="shrink-0">
                                    <img src="{{ asset('storage/' . $service->image) }}"
                                        class="w-32 h-32 object-cover rounded-lg shadow-sm border border-gray-200">
                                    <p
                                        class="text-[10px] text-center mt-2 text-gray-400 uppercase font-bold tracking-tighter">
                                        Current Image</p>
                                </div>
                            @endif

                            <div class="grow">
                                <input type="file" name="image"
                                    class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2.5 file:px-4
                                file:rounded-full file:border-0
                                file:text-xs file:font-bold
                                file:bg-[#B11E38]/10 file:text-[#B11E38]
                                hover:file:bg-[#B11E38]/20 file:cursor-pointer transition-colors">
                                <p class="mt-2 text-xs text-gray-400 italic font-medium leading-relaxed">Recommended: Square
                                    or 4:3 aspect ratio high-quality JPG/PNG.</p>
                                @error('image')
                                    <p class="text-red-500 text-[11px] mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Featured Checkbox --}}
                    <div class="md:col-span-2 bg-gray-50/50 p-4 rounded-lg border border-gray-100 mt-2">
                        <label class="flex items-center gap-4 cursor-pointer group">
                            <input type="hidden" name="is_featured" value="0">
                            <div class="relative flex items-center">
                                <input type="checkbox" name="is_featured" value="1"
                                    class="w-6 h-6 rounded border-gray-300 text-[#B11E38] focus:ring-[#B11E38] transition-all cursor-pointer"
                                    {{ old('is_featured', $service->is_featured ?? false) ? 'checked' : '' }}>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-sm font-bold text-stone-800 group-hover:text-[#B11E38] transition-colors">Featured
                                    Service</span>
                                <span
                                    class="text-[11px] text-gray-500 leading-relaxed uppercase tracking-tighter font-medium">Position
                                    as the prominent "Big Left Card" on the services section</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Submit & Back --}}
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 bg-[#7CB80E] hover:bg-[#689a0c] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        {{ isset($service) ? 'Update Service' : 'Create Service' }}
                    </button>

                    <a href="{{ route('services.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
