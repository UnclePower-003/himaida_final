@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ isset($formulation) ? 'Edit' : 'Create' }} Formulation
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Configure the specific details, iconography, and layout positioning for your formulation section.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form method="POST"
                action="{{ isset($formulation) ? route('formulations.update', $formulation) : route('formulations.store') }}"
                enctype="multipart/form-data" class="space-y-6">

                @csrf
                @if (isset($formulation))
                    @method('PUT')
                @endif

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" value="{{ $formulation->title ?? old('title') }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="Enter formulation title" required>
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="Describe this formulation piece...">{{ $formulation->description ?? old('description') }}</textarea>
                </div>

                {{-- Icon Image --}}
                <div class="pt-4 border-t border-gray-50">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Icon Image</label>
                    <div class="flex items-center gap-6">
                        @if (isset($formulation) && $formulation->icon)
                            <div class="shrink-0 bg-gray-50 p-2 rounded-lg border border-gray-100">
                                <img src="{{ asset('storage/' . $formulation->icon) }}"
                                    class="w-16 h-16 object-cover rounded shadow-sm">
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
                        </div>
                    </div>
                </div>

                {{-- Position & Status Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-gray-50">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 text-stone-800">Layout Position</label>
                        <select name="position"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm bg-white appearance-none">
                            <option value="left"
                                {{ isset($formulation) && $formulation->position == 'left' ? 'selected' : '' }}>Left Side
                            </option>
                            <option value="right"
                                {{ isset($formulation) && $formulation->position == 'right' ? 'selected' : '' }}>Right Side
                            </option>
                            <option value="center"
                                {{ isset($formulation) && $formulation->position == 'center' ? 'selected' : '' }}
                                {{ isset($formulations) && $formulations->where('position', 'center')->count() && !isset($formulation) ? 'disabled' : '' }}>
                                Center (Only one allowed)
                            </option>
                        </select>
                    </div>

                    <div class="flex items-end">
                        <label
                            class="flex items-center gap-3 cursor-pointer group p-3 rounded-lg hover:bg-gray-50 transition-colors w-full border border-dashed border-transparent hover:border-gray-200">
                            <input type="checkbox" name="status" value="1"
                                class="w-5 h-5 rounded border-gray-300 text-[#B11E38] focus:ring-[#B11E38] transition-all cursor-pointer"
                                {{ isset($formulation) && $formulation->status ? 'checked' : '' }}>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-700 group-hover:text-[#B11E38]">Active
                                    Status</span>
                                <span class="text-[10px] text-gray-400 uppercase tracking-tighter">Visible on website</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-12 py-3 bg-[#7CB80E] hover:bg-[#689a0c] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        Save Formulation
                    </button>

                    <a href="{{ route('formulations.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
