@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                    Product Descriptions
                </h2>
                <p class="text-[#C9962A] text-sm font-medium mt-1">Manage and organize your marketing copy</p>
            </div>

            <a href="{{ route('productdesc.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="12 4v16m8-8H4"></path>
                </svg>
                Add Paragraph
            </a>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Content Preview
                            </th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] w-40">Status/Tag
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($descs as $desc)
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-6 py-5">
                                    <p class="text-gray-700 leading-relaxed text-sm line-clamp-2 group-hover:text-black">
                                        {{ $desc->paragraph }}
                                    </p>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-stone-100 text-stone-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#0E733D] mr-2"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end items-center space-x-3">
                                        <a href="{{ route('productdesc.edit', $desc->id) }}"
                                            class="text-amber-600 hover:text-amber-700 font-medium text-sm transition-colors">
                                            Edit
                                        </a>

                                        <span class="text-gray-300">|</span>

                                        <form action="{{ route('productdesc.destroy', $desc->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 font-medium text-sm transition-colors"
                                                onclick="return confirm('Confirm deletion?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($descs->isEmpty())
                <div class="py-12 text-center">
                    <p class="text-gray-400">No paragraphs found. Start by adding one above.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
