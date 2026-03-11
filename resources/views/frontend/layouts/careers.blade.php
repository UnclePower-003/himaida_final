@extends('frontend.app')

@section('content')
    {{-- header herosection --}}
    <section>
        <div class="relative w-full">
            <img src="{{ asset('images/career/banner.png') }}" alt="" class='w-full object-cover object-center'>
            {{-- <div class="absolute inset-0 bg-black/50"></div> --}}
        </div>
    </section>

    {{-- Value section --}}
    <section class="py-24">
        <div class="flex flex-col justify-center items-center space-y-10">
            <div class="flex flex-col justify-center items-center text-center space-y-5">
                <h1 class="text-3xl md:text-4xl uppercase tracking-tight font-semibold">Our Value</h1>
                <div class="h-0.5 w-16 bg-gray-300"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div
                    class="flex flex-col justify-center items-center text-center bg-[#FAFAFA] p-5 px-16 rounded-lg shadow-lg space-y-5">
                    <img src="{{ asset('images/career/Group 117.png') }}" alt="" class='max-h-20 max-w-20'>
                    <h2 class='uppercase font-medium max-w-[150px] '>collaborative culture</h2>
                </div>
                <div
                    class="flex flex-col justify-center items-center text-center bg-[#FAFAFA] p-5 px-16 rounded-lg shadow-lg space-y-5">
                    <img src="{{ asset('images/career/Group 117.png') }}" alt="" class='max-h-20 max-w-20'>
                    <h2 class='uppercase font-medium max-w-[150px] '>collaborative culture</h2>
                </div>
                <div
                    class="flex flex-col justify-center items-center text-center bg-[#FAFAFA] p-5 px-16 rounded-lg shadow-lg space-y-5">
                    <img src="{{ asset('images/career/Group 117.png') }}" alt="" class='max-h-20 max-w-20'>
                    <h2 class='uppercase font-medium max-w-[150px] '>collaborative culture</h2>
                </div>

            </div>
        </div>
    </section>

    <!-- Open Positions Section -->
    <section class='bg-gray-50'>
        <div class="max-w-7xl mx-auto px-6 py-16 ">

            <!-- Section Header -->
            <div class="mb-10">
                <h2 class="text-3xl font-bold  text-black tracking-tight uppercase">
                    Open Positions
                </h2>
                <!-- Short underline decorative element -->
                <div class="h-0.5 w-12 bg-gray-400 mt-4"></div>
            </div>

            <!-- Jobs Container -->
            <div class="space-y-6 font-inter">

                <!-- Job Card 1: Sales Manager -->
                <div
                    class="bg-white rounded-xl p-8 md:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex-1 space-y-4">
                        <h3 class="text-2xl font-bold text-black">Sales Manager</h3>
                        <p class="text-stone-600 text-sm leading-relaxed max-w-2xl">
                            Drive Himaida's national and global expansion by identifying new B2B opportunities, managing
                            partners, and closing high-value contracts.
                        </p>

                        <!-- Job Meta Tags -->
                        <div class="flex flex-wrap gap-3 pt-2">
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-medium bg-red-50 text-[#B11E38] border border-red-100">
                                Sales & Business Development
                            </span>
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-medium bg-gray-50 text-stone-700 border border-gray-100">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-stone-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Kathmandu (Headquarters)
                            </span>
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-medium bg-gray-50 text-stone-700 border border-gray-100">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-stone-400" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                </svg>
                                Full-Time
                            </span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="flex-shrink-0">
                        <button
                            class="w-full md:w-auto bg-[#B11E38] hover:bg-[#8E182D] text-white px-8 py-3 rounded-lg font-semibold flex items-center justify-center transition-all transform hover:scale-[1.02] group">
                            Apply Now
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Job Card 2: Content Strategist -->
                <div
                    class="bg-white rounded-xl p-8 md:p-10 shadow-sm border border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex-1 space-y-4">
                        <h3 class="text-2xl font-bold text-black">Content Strategist</h3>
                        <p class="text-stone-600 text-sm leading-relaxed max-w-2xl">
                            Shape the voice of our premium brands. You will develop compelling narratives that bridge
                            Himalayan
                            tradition with modern global wellness trends across all digital and physical touchpoints.
                        </p>

                        <!-- Job Meta Tags -->
                        <div class="flex flex-wrap gap-3 pt-2">
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-medium bg-red-50 text-[#B11E38] border border-red-100">
                                Marketing & Creative
                            </span>
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-medium bg-gray-50 text-stone-700 border border-gray-100">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-stone-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Kathmandu (Headquarters)
                            </span>
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-medium bg-gray-50 text-stone-700 border border-gray-100">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-stone-400" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                </svg>
                                Full-Time
                            </span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="flex-shrink-0">
                        <button
                            class="w-full md:w-auto bg-[#B11E38] hover:bg-[#8E182D] text-white px-8 py-3 rounded-lg font-semibold flex items-center justify-center transition-all transform hover:scale-[1.02] group">
                            Apply Now
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="relative bg-primary py-16 px-6 overflow-hidden">


        <div class="relative max-w-4xl mx-auto text-center z-10">
            <!-- Main Heading -->
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-medium text-white mb-6 tracking-tight uppercase">
                Don't See a Perfect Match?
            </h2>

            <!-- Subtext -->
            <div class="max-w-2xl mx-auto mb-10">
                <p class="text-white text-opacity-90 text-sm md:text-base leading-relaxed">
                    We're always interested in meeting talented individuals.<br class="hidden md:block">
                    Send us your resume and tell us about yourself.
                </p>
            </div>

            <!-- Action Button -->
            <div class="flex justify-center">
                <a href="#"
                    class="inline-flex items-center bg-white text-[#B11E38] px-8 py-4 rounded-lg font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl group">
                    Send Your Resume
                    <svg class="w-5 h-5 ml-2 transition-transform duration-300 transform group-hover:translate-x-1"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
