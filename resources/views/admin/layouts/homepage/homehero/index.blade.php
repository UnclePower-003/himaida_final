@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                    Home Hero Section
                </h2>
                <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                    Manage the main banners and calls-to-action on your homepage.
                </p>
            </div>

            <a href="{{ route('homehero.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 4v16m8-8H4"></path>
                </svg>
                Add New Hero
            </a>
        </div>

        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-50 border-l-4 border-[#0E733D] text-[#0E733D] rounded-r-lg text-sm font-medium shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] w-16 text-center">
                                #</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48 text-center">
                                Preview</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Heading &
                                Content</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] w-40">Button Text
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($homehero as $index => $hero)
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-6 py-4 text-center text-sm text-gray-400 font-mono">
                                    {{ sprintf('%02d', $index + 1) }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        @if ($hero->image)
                                            <div
                                                class="w-32 h-16 rounded-lg bg-gray-100 border border-gray-200 overflow-hidden shadow-sm">
                                                <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Preview"
                                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                            </div>
                                        @else
                                            <span class="text-xs text-gray-400 italic font-medium">No Image</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="text-sm font-semibold text-gray-800 leading-relaxed group-hover:text-[#B11E38] transition-colors">
                                        {{ $hero->heading }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-stone-100 text-stone-800 border border-stone-200 uppercase tracking-tighter">
                                        {{ $hero->button_text ?? 'No Button' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('homehero.edit', $hero->id) }}"
                                            class="text-amber-500 hover:text-amber-600 font-bold text-sm transition-colors uppercase tracking-tight">
                                            Edit
                                        </a>

                                        <span class="text-gray-200">|</span>

                                        <form action="{{ route('homehero.destroy', $hero->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 font-bold text-sm transition-colors uppercase tracking-tight"
                                                onclick="return confirm('Are you sure you want to delete this hero?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-16 text-center">
                                    <div
                                        class="bg-gray-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h3 class="text-gray-500 font-medium">No hero banners found</h3>
                                    <p class="text-gray-400 text-sm mt-1">Start by adding a new banner for your landing
                                        page.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
