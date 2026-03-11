@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                    Admins List
                </h2>
                <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                    Manage administrative access and user permissions.
                </p>
            </div>

            <a href="{{ route('users.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-[#B11E38] hover:bg-[#8E182D] text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 ease-in-out transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Add Admin
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
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Name</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#8E182D]">Email Address
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-[#8E182D] w-48">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-6 py-4 text-center text-sm text-gray-400 font-mono">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class="text-sm font-semibold text-gray-800 leading-relaxed group-hover:text-[#B11E38] transition-colors">
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 leading-relaxed font-medium">
                                        {{ $user->email }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="text-amber-500 hover:text-amber-600 font-bold text-sm transition-colors uppercase tracking-tight">
                                            Edit
                                        </a>

                                        <span class="text-gray-200">|</span>

                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 font-bold text-sm transition-colors uppercase tracking-tight"
                                                onclick="return confirm('Are you sure you want to delete this admin?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-16 text-center">
                                    <div
                                        class="bg-gray-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-gray-500 font-medium">No admins found</h3>
                                    <p class="text-gray-400 text-sm mt-1 leading-relaxed">Try adding a new administrator to
                                        manage the system.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
