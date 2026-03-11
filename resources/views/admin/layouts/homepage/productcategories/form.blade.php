@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($productcategory) ? 'Edit' : 'Add' }} Category
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1">
                Define the visual identity and naming for your product groupings.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST"
                action="{{ isset($productcategory)
                    ? route('productcategories.update', $productcategory->id)
                    : route('productcategories.store') }}"
                enctype="multipart/form-data" class="space-y-6">

                @csrf
                @if (isset($productcategory))
                    @method('PUT')
                @endif

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category Title</label>
                    <input type="text" name="title" value="{{ old('title', $productcategory->title ?? '') }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="e.g. Summer Collection" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category Image</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-lg hover:border-[#B11E38]/50 transition-colors group">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-[#B11E38] transition-colors"
                                stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-[#B11E38] hover:text-[#8E182D]">
                                    <span>Upload a file</span>
                                    <input id="image-upload" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-400">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                    @if (isset($productcategory->image))
                        <div class="mt-2 flex items-center space-x-2">
                            <span class="text-xs text-stone-800 font-medium bg-stone-100 px-2 py-1 rounded">Current:
                                {{ $productcategory->image }}</span>
                        </div>
                    @endif
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Background Color (Hex)</label>
                    <div class="relative">
                        <input type="text" name="bg_color"
                            value="{{ old('bg_color', $productcategory->bg_color ?? '') }}"
                            class="w-full px-4 py-3 pl-12 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm font-mono"
                            placeholder="#BEE3F1">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <div class="w-5 h-5 rounded shadow-inner border border-gray-100"
                                style="background-color: {{ $productcategory->bg_color ?? '#F3F4F6' }}"></div>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-gray-400 italic">This color will appear behind the product image in the
                        gallery.</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 bg-[#B11E38] hover:bg-[#8E182D] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        {{ isset($productcategory) ? 'Update Category' : 'Save Category' }}
                    </button>

                    <a href="{{ route('productcategories.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Back to List
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
