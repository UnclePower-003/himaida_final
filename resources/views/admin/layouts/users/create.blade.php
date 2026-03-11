@extends('admin.components.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-[#B11E38]">
                Add New Admin
            </h2>
            <p class="text-[#C9962A] text-sm font-medium mt-1 leading-relaxed">
                Create a new administrative account with system-wide access.
            </p>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-600 text-red-800 rounded-r-lg shadow-sm text-sm">
                <div class="flex items-center mb-2 font-bold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>Please fix the following:</span>
                </div>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden p-6 md:p-8">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                            placeholder="e.g. John Doe" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm leading-relaxed"
                            placeholder="john@example.com" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-50">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm"
                                placeholder="••••••••" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#B11E38]/20 focus:border-[#B11E38] outline-none transition-all text-sm"
                                placeholder="••••••••" required>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-gray-50">
                    <a href="{{ route('users.index') }}"
                        class="w-full sm:w-auto px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold rounded-lg text-center transition-colors">
                        Back to List
                    </a>

                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 bg-[#B11E38] hover:bg-[#8E182D] text-white font-bold rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none">
                        Create Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
