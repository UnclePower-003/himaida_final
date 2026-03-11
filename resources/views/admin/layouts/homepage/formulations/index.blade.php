@extends('admin.components.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                Formulations
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Manage the layout, iconography, and active status of product formulations.
            </p>
        </div>

        <a href="{{ route('formulations.create') }}" 
           class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Formulation
        </a>
    </div>

    <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Title</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] text-center w-32">Position</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] text-center w-24">Icon</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D] text-center w-32">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($formulations as $item)
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-800 leading-relaxed group-hover:text-[#B11E38] transition-colors">
                                {{ $item->title }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-xs font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded">
                                {{ ucfirst($item->position) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                @if($item->icon)
                                    <div class="w-10 h-10 rounded bg-primary border border-gray-200 overflow-hidden flex items-center justify-center">
                                        <img src="{{ asset('storage/'.$item->icon) }}" class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <span class="text-[10px] text-gray-400 italic">No Icon</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->status)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#7CB80E]/10 text-stone-800 border border-[#7CB80E]/20 uppercase tracking-widest">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-400 border border-gray-200 uppercase tracking-widest">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-4">
                                <a href="{{ route('formulations.edit', $item) }}" 
                                   class="text-amber-500 hover:text-amber-600 font-bold text-sm transition-colors uppercase tracking-tight">
                                    Edit
                                </a>

                                <span class="text-gray-200">|</span>

                                <form action="{{ route('formulations.destroy', $item) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-700 font-bold text-sm transition-colors uppercase tracking-tight"
                                            onclick="return confirm('Delete this formulation item?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-gray-400 italic text-sm">
                            No formulations found. Click "Add New" to get started.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection