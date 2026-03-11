@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($productdesc) ? 'Edit' : 'Add' }} Paragraph
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1">
                Craft high-quality descriptions for your product displays.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST"
                action="{{ isset($productdesc) ? route('productdesc.update', $productdesc->id) : route('productdesc.store') }}">

                @csrf
                @if (isset($productdesc))
                    @method('PUT')
                @endif

                <div class="mb-6">
                    <label for="paragraph" class="block text-sm font-semibold text-gray-700 mb-2">
                        Paragraph Content
                    </label>
                    <textarea name="paragraph" id="paragraph" rows="8"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all leading-relaxed text-sm text-gray-800 bg-gray-50/30"
                        placeholder="Enter your product description here..." required>{{ old('paragraph', $productdesc->paragraph ?? '') }}</textarea>
                    <p class="mt-2 text-xs text-gray-400">Keep it concise and engaging for better customer conversion.</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-4 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-8 py-3 bg-[#B11E38] hover:bg-[#8E182D] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#B11E38]/50">
                        {{ isset($productdesc) ? 'Update Paragraph' : 'Save Paragraph' }}
                    </button>

                    <a href="{{ route('productdesc.index') }}"
                        class="w-full sm:w-auto px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors duration-200">
                        Cancel & Back
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
