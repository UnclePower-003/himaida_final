@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                {{ $stat->exists ? 'Edit Stat' : 'Add Stat' }}
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Update your counter statistics and numerical highlights.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form action="{{ $stat->exists ? route('stats.update', $stat) : route('stats.store') }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if ($stat->exists)
                    @method('PUT')
                @endif

                {{-- Value Input --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Value (Number or Text)</label>
                    <input type="text" name="value" value="{{ old('value', $stat->value) }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="e.g., 500+ or 100%" required>
                </div>

                {{-- Title Input --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $stat->title) }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="e.g., Happy Clients" required>
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                        placeholder="Brief context about this statistic...">{{ old('description', $stat->description) }}</textarea>
                </div>

                {{-- Icon Upload --}}
                <div class="pt-4 border-t border-gray-50">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Icon Image</label>
                    <div class="flex items-center gap-6">
                        @if ($stat->icon)
                            <div class="shrink-0 bg-gray-50 p-2 rounded-lg border border-gray-100">
                                <img src="{{ asset('storage/' . $stat->icon) }}" class="w-16 h-16 object-contain">
                                <p class="text-[9px] text-center mt-1 text-gray-400 font-bold uppercase">Active</p>
                            </div>
                        @endif

                        <div class="grow">
                            <input type="file" name="icon"
                                class="block w-full text-sm text-gray-500
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-full file:border-0
                               file:text-xs file:font-bold
                               file:bg-[#B11E38]/10 file:text-[#B11E38]
                               hover:file:bg-[#B11E38]/20 file:cursor-pointer transition-colors">
                        </div>
                    </div>
                </div>

                {{-- Submit Actions --}}
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-50">
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 bg-[#7CB80E] hover:bg-[#689a0c] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        {{ $stat->exists ? 'Update Stat' : 'Create Stat' }}
                    </button>

                    <a href="{{ route('stats.index') }}"
                        class="w-full sm:w-auto px-10 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
