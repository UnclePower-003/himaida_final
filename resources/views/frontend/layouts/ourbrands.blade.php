@extends('frontend.app')

@section('content')
    @push('style')
        <style>
            .text-gold {
                color: #C9962A;
            }

            .bg-gold {
                background-color: #C9962A;
            }
        </style>
    @endpush
    {{-- hero section --}}
    <section class="relative z-20">

        <!-- Hero Container -->
        <div class="relative w-full h-full">

            <!-- Background Image -->
            <img src="{{ $hero?->background_image
                ? asset('storage/' . $hero->background_image)
                : asset('images/privatelable/BANNNER.png') }}"
                class="w-full object-cover object-center">

            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center h-full px-6">
                <div class="relative text-center  tracking-tight max-w-4xl">

                    <h1 class="text-3xl sm:text-4xl md:text-6xl font-semibold leading-tight">
                        {{ $hero?->title_line_1 }}
                        <span class="text-primaryText">{{ $hero?->highlight_1 }}</span>
                        <br>
                        {{ $hero?->title_line_2 }}
                        <span class="text-primaryText">{{ $hero?->highlight_2 }}</span>
                    </h1>

                    <div
                        class="hidden md:block absolute -top-2 -right-2 
                w-0 h-0
                border-l-[10px] border-l-transparent
                border-b-[14px] border-b-[#B11E38]
                rotate-[35deg]">
                    </div>

                </div>
            </div>

        </div>

    </section>

    <!-- Himalaya's Own Brand Spotlight -->
    <section>
        <div class="max-w-7xl mx-auto px-4 pt-20">
            @foreach ($brands as $brand)
                <div class="pt-12 py-16">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold text-center uppercase tracking-tighter mb-12"
                        style="color: {{ $brand->title_color }};">
                        {{ $brand->title }}
                    </h1>

                    <div class="max-w-7xl mx-auto px-4 py-10 space-y-5 lg:flex justify-between border-t border-gray-300">
                        <img src="{{ $brand->brand_image ? asset('storage/' . $brand->brand_image) : 'https://via.placeholder.com/361' }}"
                            alt="{{ $brand->title }}"
                            class="min-w-[361px] min-h-[361px] max-w-[361px] max-h-[361px] object-contain transition-transform duration-500 hover:scale-105">

                        <div class="bg-white flex flex-col justify-center px-3 lg:p-16">
                            <p class="text-stone-800 text-[18px] leading-relaxed text-justify">{{ $brand->description }}
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 border-b border-t border-gray-200 mt-6">
                        <div
                            class="flex items-center justify-center py-12 border-b md:border-b-0 md:border-r border-gray-200">
                            <span class="text-black font-medium text-lg">Our Product Range</span>
                        </div>

                        <div
                            class="flex items-center justify-center py-8 border-b md:border-b-0 md:border-r border-gray-200 ">
                            <div class="w-[300px] h-[300px] rounded-full overflow-hidden ">
                                <img src="{{ $brand->circle_image ? asset('storage/' . $brand->circle_image) : 'https://via.placeholder.com/300' }}"
                                    alt="" class='object-contain h-full w-full'>
                            </div>
                        </div>

                        <div class="flex items-center justify-center p-8">
                            <div class="flex flex-wrap gap-3 justify-center">
                                @foreach ($brand->tags ?? [] as $tag)
                                    <span
                                        class="px-3 py-[3px] flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('frontend.components.getintouch')
@endsection
