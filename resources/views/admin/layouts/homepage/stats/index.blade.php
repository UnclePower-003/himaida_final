@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                    Stats
                </h2>
                <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                    Manage the numerical highlights and impact metrics shown on your site.
                </p>
            </div>

            <a href="{{ route('stats.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Stat
            </a>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100">
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] w-16 text-center">
                                #</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Value</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Title</th>
                            <th
                                class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] text-center w-24">
                                Icon</th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($stats as $stat)
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-6 py-4 text-center text-sm text-gray-400 font-mono">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base font-bold text-[#B11E38] leading-relaxed">
                                        {{ $stat->value }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="text-sm font-semibold text-gray-800 leading-relaxed group-hover:text-[#B11E38] transition-colors">
                                        {{ $stat->title }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        @if ($stat->icon)
                                            <div
                                                class="w-12 h-12 rounded bg-gray-50 border border-gray-100 p-1 flex items-center justify-center overflow-hidden">
                                                <img src="{{ asset('storage/' . $stat->icon) }}"
                                                    class="max-w-full max-h-full object-contain">
                                            </div>
                                        @else
                                            <span class="text-[10px] text-gray-300 italic">No Icon</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('stats.edit', $stat) }}"
                                            class="text-amber-500 hover:text-amber-600 font-bold text-sm transition-colors uppercase tracking-tight">
                                            Edit
                                        </a>

                                        <span class="text-gray-200">|</span>

                                        <form action="{{ route('stats.destroy', $stat) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 font-bold text-sm transition-colors uppercase tracking-tight"
                                                onclick="return confirm('Permanently delete this stat?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-16 text-center text-gray-400 italic text-sm">
                                    No stats have been added to the dashboard yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
