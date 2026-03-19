@extends('frontend.app')

@section('content')
    @push('style')
        {{-- Optional: CSS for custom aspect ratios --}}
        <style>
            .aspect-square {
                aspect-ratio: 1 / 1;
            }

            .aspect-video {
                aspect-ratio: 16 / 9;
            }

            @media (max-width: 768px) {
                .aspect-square {
                    aspect-ratio: 1 / 1;
                }
            }

            /* Hide scrollbar but keep scroll */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    @endpush
    {{-- Section1 Herosection --}}
    <section>
        <div class="relative w-full h-screen md:h-[80vh] flex items-center">
            {{-- Image --}}
            <div class="absolute inset-0">
                <img src="{{ $homehero && $homehero->image ? asset('storage/' . $homehero->image) : asset('images/home/bannerhimaida.jpg') }}"
                    alt="{{ $homehero->heading ?? 'Premium Himalayan Honey Products' }}"
                    class="w-full h-full object-cover object-center">
            </div>

            {{-- Overlay --}}
            <div class="absolute inset-0 bg-black/30 md:bg-black/20"></div>

            {{-- Content --}}
            <div class="relative w-full px-4 sm:px-6 md:px-8 lg:px-12 max-w-7xl mx-auto">
                <div class="text-start space-y-4 sm:space-y-6 md:space-y-8">
                    <h1
                        class="max-w-5xl text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl tracking-tight md:tracking-wider font-bold leading-tight md:leading-relaxed">
                        {{ $homehero->heading ?? 'PREMIUM HONEY PRODUCTS FOR EVOLVING GLOBAL MARKETS' }}
                    </h1>
                    <p
                        class="max-w-lg text-gray-100 text-base sm:text-lg md:text-xl lg:text-2xl tracking-tight italic  leading-relaxed md:leading-loose">
                        {{ $homehero->subheading ?? 'A wide range of premium, ethically sourced Himalayan honey products' }}
                    </p>
                    <div class="pt-2 sm:pt-4 md:pt-6">
                        <a href="{{ $homehero->button_link ?? route('home') }}"
                            class="inline-block py-2.5 sm:py-3 px-6 sm:px-8 bg-white text-primary rounded-full font-bold tracking-wide text-sm sm:text-base hover:bg-gray-100 transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                            {{ $homehero->button_text ?? 'Explore More' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Product Range Section --}}
    <section class="py-12 md:py-16 lg:py-20 px-4 sm:px-6 md:px-8 lg:px-12 bg-white">
        <div class="max-w-6xl mx-auto">

            {{-- Section Header --}}
            <div class="text-center mb-8 md:mb-12 lg:mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-wide">
                    OUR PRODUCT RANGE
                </h2>
                <div class="flex justify-center">
                    <div class="w-16 h-1 bg-gray-400"></div>
                </div>
            </div>

            {{-- Description Text --}}
            <div class="max-w-6xl mx-auto mb-12 space-y-6 text-left">
                @foreach ($descs as $desc)
                    <p class="text-gray-700 text-lg leading-relaxed text-justify">
                        {{ $desc->paragraph }}
                    </p>
                @endforeach
            </div>

            {{-- Product Categories Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-0 border border-gray-400">
                @foreach ($products as $product)
                    <div class="border p-6 flex flex-col items-center justify-center text-center hover:bg-gray-50">
                        <div class="p-4">
                            <img src="{{ asset('storage/' . $product->image) }}" class="w-14 object-contain">
                        </div>
                        <h3 class="font-medium uppercase text-center tracking-wider max-w-[160px]">
                            {!! nl2br(e($product->title)) !!}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Product Categories Section --}}
    <section class="max-w-7xl mx-auto px-4 py-12">
        @php
            $first = $categories->first();
            $rest = $categories->slice(1);
        @endphp

        <div class="flex flex-col lg:flex-row gap-3 w-full lg:h-[600px]">

            {{-- FEATURED LEFT CARD --}}
            @if ($first)
                <div class="w-full lg:w-[35%] lg:h-full group overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl rounded-[5px]"
                    style="background: {{ $first->bg_color }}">

                    <div class="flex-1 flex items-center justify-center overflow-hidden p-2">
                        <img src="{{ asset('storage/' . $first->image) }}" alt="{{ $first->title }}"
                            class="w-full h-full object-contain">
                    </div>

                    <div class="p-4 text-center px-4 shrink-0">
                        <h3 class="text-2xl max-w-[200px] mx-auto font-bold uppercase tracking-tight leading-relaxed">
                            {{ $first->title }}
                        </h3>
                    </div>
                </div>
            @endif

            {{-- RIGHT SIDE: 2×2 FLEX GRID --}}
            <div class="w-full lg:w-[65%] lg:h-full flex flex-col gap-3">

                {{-- Row 1 --}}
                <div class="flex flex-col sm:flex-row gap-3 flex-1 h-[40%]">
                    @foreach ($rest->take(2) as $cat)
                        <div class="flex-1 group overflow-hidden flex flex-col transition-all duration-300 hover:shadow-lg rounded-[5px] border border-transparent hover:border-gray-200"
                            style="background: {{ $cat->bg_color }}">

                            <div
                                class="flex-1 p-2 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->title }}"
                                    class="w-full h-full object-contain">
                            </div>

                            <div class="pb-6 text-center shrink-0 px-2">
                                <h3 class="text-lg font-semibold uppercase tracking-tight leading-relaxed">
                                    {{ $cat->title }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Row 2 --}}
                <div class="flex flex-col sm:flex-row gap-3 flex-1 h-[40%]">
                    @foreach ($rest->skip(2)->take(2) as $cat)
                        <div class="flex-1 group overflow-hidden flex flex-col transition-all duration-300 hover:shadow-lg rounded-[5px] border border-transparent hover:border-gray-200"
                            style="background: {{ $cat->bg_color }}">

                            <div
                                class="flex-1 p-2 flex items-center justify-center overflow-hidden min-h-[200px] lg:min-h-0">
                                <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->title }}"
                                    class="w-full h-full object-contain">
                            </div>

                            <div class="pb-6 text-center shrink-0 px-2">
                                <h3 class="text-lg font-semibold uppercase tracking-tight leading-relaxed">
                                    {{ $cat->title }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
    {{-- Our Services --}}
    <section class="max-w-7xl mx-auto px-4 py-16">

        <!-- HEADER SECTION -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold uppercase text-black mb-4">Our Services</h2>
            <div class="h-0.5 w-16 bg-gray-300 mx-auto mb-8"></div>

            <div class="max-w-6xl mx-auto space-y-4 text-sm md:text-base leading-relaxed">
                <p>
                    Experience the ease of working with contract manufacturers who prioritize quality, purity, and
                    innovation.
                    Himaida offers comprehensive honey manufacturing solutions from private label honey to customized honey
                    products,
                    ensuring your brand requirements are met with precision, consistency, and care.
                </p>
                <p>
                    Step into the world of natural goodness with confidence, supported by one of the trusted private label
                    honey
                    manufacturers and suppliers in the industry. Partner with Himaida for a seamless journey from sourcing
                    to creation,
                    and let your brand stand out with our premium honey manufacturing expertise.
                </p>
            </div>
        </div>

        <!-- SERVICES GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- FEATURED SERVICE (Left Large Card) --}}
            @if ($featuredService)
                <div
                    class="lg:row-span-2 group rounded-lg overflow-hidden bg-[#F9F9F9] flex flex-col h-full transition-shadow hover:shadow-lg">
                    <div class="h-[300px] lg:h-[50%] w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $featuredService->image) }}" alt="{{ $featuredService->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>

                    <div class="p-8 flex flex-col flex-grow relative">
                        @if ($featuredService->subtitle)
                            <p class="text-xs font-semibold uppercase mb-2 tracking-wide">
                                {{ $featuredService->subtitle }}
                            </p>
                        @endif
                        <h3 class="text-xl md:text-2xl font-bold text-primary uppercase mb-4 leading-tight">
                            {{ $featuredService->title }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">
                            {{ $featuredService->description }}
                        </p>

                        <div class="mt-auto flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="#C41C2C" class="w-8 h-8 transition-transform group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endif

            {{-- OTHER SERVICES (Right Normal Cards) --}}
            @foreach ($otherServices as $service)
                <div
                    class="group rounded-lg bg-[#F9F9F9] p-8 flex flex-col justify-between items-center min-h-[300px] transition-shadow hover:shadow-lg">
                    <div class=''>
                        <h3 class="text-xl md:text-2xl font-bold text-primary uppercase mb-3 leading-tight">
                            {{ $service->title }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="#C41C2C" class="w-8 h-8 transition-transform group-hover:translate-x-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{-- Our process Section --}}
    <section class="bg-[#F0F9FF] py-16 px-4 text-gray-800 ">

        <div class="overflow-hidden max-w-7xl mx-auto items-center flex flex-col">
            <div class="m   "> <!-- Header -->
                <div class=" mb-12 text-justify ">
                    <h2 class="text-3xl md:text-4xl font-semibold uppercase text-center ">Our Process</h2>
                    <div class="h-0.5 w-16 bg-gray-500 mx-auto mt-4 mb-8"></div>
                    <p class="w-full mx-auto text-sm md:text-base leading-relaxed tracking-wide">
                        At Himaida, we extend our comprehensive services to a diverse range of clients, catering to B2B
                        businesses, D2C / DTC brands, and online sellers including Amazon. Whether you're a large-scale
                        retailer
                        or an individual entrepreneur, our cosmetic manufacturing solutions are tailored to meet your
                        specific
                        needs, ensuring seamless production and delivery of high-quality cosmetic products to your
                        customers.
                    </p>
                </div>
            </div>

            <div class=" w-full overflow-x-auto pt-8 ">
                <div class="flex justify-between items-stretch gap-4 min-h-[350px]">

                    @foreach ($processSteps as $step)
                        @php
                            $isTop = $step->position === 'top';
                            $bgColor = $isTop ? '#A91D3A' : '#F48C26';
                        @endphp

                        <div
                            class="flex {{ $isTop ? 'flex-col items-center justify-start' : 'flex-col-reverse items-center justify-end' }} group  flex-1 space-y-2">

                            <!-- Circle / Icon -->
                            <div class="w-20 h-20 rounded-full flex items-center justify-center shadow-md z-10"
                                style="background-color: {{ $bgColor }};">
                                @if ($step->icon)
                                    <img src="{{ asset('storage/' . $step->icon) }}" class="w-10 h-10 object-contain"
                                        alt="{{ $step->title }}">
                                @else
                                    <!-- default placeholder SVG if no icon -->
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                @endif
                            </div>

                            <!-- Arrow connecting steps -->
                            <div class="flex flex-col items-center">
                                @if ($isTop)
                                    <div class="w-px h-20 bg-gray-300"></div>
                                    <svg class="w-3 h-3 text-gray-300 -mt-1" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 21l-12-18h24z" />
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 text-gray-300 -mb-1 rotate-180" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path d="M12 21l-12-18h24z" />
                                    </svg>
                                    <div class="w-px h-20 bg-gray-300"></div>
                                @endif
                            </div>

                            <!-- Step title -->
                            <div class="{{ $isTop ? 'mt-2 text-center' : 'mb-2 text-center' }}">
                                <h3 class="font-bold uppercase text-sm md:text-base leading-tight">{{ $step->title }}
                                </h3>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>

    {{-- Formulations --}}
    <section class="py-16 bg-white px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            {{-- Section Header --}}
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-medium tracking-tight uppercase leading-tight">
                    Bring Unique Products <br class="hidden md:block" />
                    And Formulations To The Market
                </h2>
                <div class="w-20 h-0.5 bg-gray-500 mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">

                {{-- LEFT SIDE ITEMS --}}
                <div class="space-y-12 order-2 lg:order-1">
                    @foreach ($formulations->where('position', 'left') as $item)
                        <div class="flex items-start lg:text-right group">
                            <div class="flex-1 pr-4 order-1 lg:order-1">
                                <h3 class="font-bold text-gray-900 mb-1">{{ $item->title }}</h3>
                                <p class="text-stone-800 text-sm leading-relaxed">{{ $item->description }}</p>
                            </div>
                            <div class="flex-shrink-0 order-2 lg:order-2">
                                <div
                                    class="w-14 h-14 bg-[#B11E38] rounded-full flex items-center justify-center text-white shadow-lg transition-transform duration-300 group-hover:scale-110 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->icon) }}" class="w-8 h-8 object-contain">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- CENTER IMAGE --}}
                <div class="order-1 lg:order-2 flex justify-center">
                    @php
                        $centerItem = $formulations->where('position', 'center')->first();
                    @endphp

                    @if ($centerItem)
                        <div class="relative w-72 h-72 md:w-96 md:h-96 rounded-full overflow-hidden shadow-2xl">
                            <img src="{{ asset('storage/' . $centerItem->icon) }}" alt="{{ $centerItem->title }}"
                                class="w-full h-full object-cover object-center" />
                        </div>
                    @else
                        {{-- fallback gray circle if no center --}}
                        <div
                            class="relative w-72 h-72 md:w-96 md:h-96 rounded-full overflow-hidden shadow-2xl bg-gray-100">
                        </div>
                    @endif
                </div>

                {{-- RIGHT SIDE ITEMS --}}
                <div class="space-y-12 order-3">
                    @foreach ($formulations->where('position', 'right') as $item)
                        <div class="flex items-start group">
                            <div class="flex-shrink-0 mr-4">
                                <div
                                    class="w-14 h-14 bg-[#B11E38] rounded-full flex items-center justify-center text-white shadow-lg transition-transform duration-300 group-hover:scale-110 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->icon) }}" class="w-8 h-8 object-contain">
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ $item->title }}</h3>
                                <p class="text-stone-800 text-sm leading-relaxed">{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16 bg-white px-4 sm:px-6 lg:px-8 font-sans">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class=" text-3xl md:text-4xl font-semibold tracking-wider uppercase leading-tight">
                    Consistency You Can Trust, <br />
                    Delivery You Can Count On
                </h2>
                <div class="w-16 h-0.5 bg-gray-500 mx-auto mt-6"></div>
            </div>

            {{-- <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 items-start">

                <div class="flex flex-col items-center text-center">
                    <div class="relative w-32 h-28 mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/home/Vector2.png') }}" alt="blob background"
                            class="absolute inset-0 w-full h-full object-contain" />

                        <div class="relative z-10 flex items-baseline">
                            <span class="text-3xl font-bold text-gray-900">1000+</span>
                        </div>

                        <div
                            class="absolute top-0 -right-1 w-0 h-0 
                      border-l-[7px] border-l-transparent 
                      border-b-[11px] border-b-[#B11E38] 
                      rotate-[35deg] z-20">
                        </div>
                    </div>

                    <div class="w-full border-t border-gray-200 pt-4 px-2">
                        <h3 class="font-bold text-gray-900 mb-2">Satisfied Clients</h3>
                        <p class="text-stone-800 text-sm leading-relaxed">
                            With a day-by-day increasing client base.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="relative w-32 h-28 mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/home/Vector2.png') }}" alt="blob background"
                            class="absolute inset-0 w-full h-full object-contain" />

                        <div class="relative z-10 flex items-baseline">
                            <span class="text-3xl font-bold text-gray-900">1000+</span>
                        </div>

                        <div
                            class="absolute top-0 -right-1 w-0 h-0 
                      border-l-[7px] border-l-transparent 
                      border-b-[11px] border-b-[#B11E38] 
                      rotate-[35deg] z-20">
                        </div>
                    </div>

                    <div class="w-full border-t border-gray-200 pt-4 px-2">
                        <h3 class="font-bold text-gray-900 mb-2">Satisfied Clients</h3>
                        <p class="text-stone-800 text-sm leading-relaxed">
                            With a day-by-day increasing client base.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="relative w-32 h-28 mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/home/Vector2.png') }}" alt="blob background"
                            class="absolute inset-0 w-full h-full object-contain" />

                        <div class="relative z-10 flex items-baseline">
                            <span class="text-3xl font-bold text-gray-900">1000+</span>
                        </div>

                        <div
                            class="absolute top-0 -right-1 w-0 h-0 
                      border-l-[7px] border-l-transparent 
                      border-b-[11px] border-b-[#B11E38] 
                      rotate-[35deg] z-20">
                        </div>
                    </div>

                    <div class="w-full border-t border-gray-200 pt-4 px-2">
                        <h3 class="font-bold text-gray-900 mb-2">Satisfied Clients</h3>
                        <p class="text-stone-800 text-sm leading-relaxed">
                            With a day-by-day increasing client base.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="relative w-32 h-28 mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/home/Vector2.png') }}" alt="blob background"
                            class="absolute inset-0 w-full h-full object-contain" />

                        <div class="relative z-10 flex items-baseline">
                            <span class="text-3xl font-bold text-gray-900">1000+</span>
                        </div>

                        <div
                            class="absolute top-0 -right-1 w-0 h-0 
                      border-l-[7px] border-l-transparent 
                      border-b-[11px] border-b-[#B11E38] 
                      rotate-[35deg] z-20">
                        </div>
                    </div>

                    <div class="w-full border-t border-gray-200 pt-4 px-2">
                        <h3 class="font-bold text-gray-900 mb-2">Satisfied Clients</h3>
                        <p class="text-stone-800 text-sm leading-relaxed">
                            With a day-by-day increasing client base.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="relative w-32 h-28 mb-6 flex items-center justify-center">
                        <img src="{{ asset('images/home/Vector2.png') }}" alt="blob background"
                            class="absolute inset-0 w-full h-full object-contain" />

                        <div class="relative z-10 flex items-baseline">
                            <span class="text-3xl font-bold text-gray-900">1000+</span>
                        </div>

                        <div
                            class="absolute top-0 -right-1 w-0 h-0 
                      border-l-[7px] border-l-transparent 
                      border-b-[11px] border-b-[#B11E38] 
                      rotate-[35deg] z-20">
                        </div>
                    </div>

                    <div class="w-full border-t border-gray-200 pt-4 px-2">
                        <h3 class="font-bold text-gray-900 mb-2">Satisfied Clients</h3>
                        <p class="text-stone-800 text-sm leading-relaxed">
                            With a day-by-day increasing client base.
                        </p>
                    </div>
                </div>

            </div> --}}
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 items-start">
                @foreach ($stats as $stat)
                    <div class="flex flex-col items-center text-center">
                        <div class="relative w-32 h-28 mb-6 flex items-center justify-center">

                            @if ($stat->icon)
                                <img src="{{ asset('storage/' . $stat->icon) }}"
                                    class="absolute inset-0 w-full h-full object-contain" />
                            @endif

                            <div class="relative z-10">
                                <span class="text-3xl font-bold text-gray-900">
                                    {{ $stat->value }}
                                </span>
                            </div>

                        </div>

                        <div class="w-full border-t border-gray-200 pt-4 px-2">
                            <h3 class="font-bold text-gray-900 mb-2">
                                {{ $stat->title }}
                            </h3>
                            <p class="text-stone-800 text-sm leading-relaxed">
                                {{ $stat->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Quote banner --}}
    <section class="bg-[#B11E38] py-8">
        <div
            class="container mx-auto px-6 lg:px-12 flex flex-col md:flex-row gap-6 md:gap-10 justify-around items-center text-center md:text-left">

            <h2 class="font-bold tracking-wider text-xl  uppercase text-white leading-relaxed max-sm:max-w-3xl">
                Looking for quality and affordable products for your brand?
            </h2>

            <div class="flex-shrink-0">
                <a href="#"
                    class="inline-block rounded-full py-3 px-8 bg-white font-bold uppercase text-sm md:text-base text-[#B11E38] 
                      transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-stone-100 active:scale-95 shadow-lg">
                    Get a Quote
                </a>
            </div>

        </div>
    </section>
    {{-- FAQ section --}}
    <section class="py-24 bg-white px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                <div class="lg:col-span-4">
                    <h2 class=" text-4xl font-semibold tracking-wider uppercase leading-tight mb-6">
                        Frequently Asked <br /> Questions (FAQ'S)
                    </h2>

                    <div class="w-16 h-0.5 bg-[#C9962A] mb-8"></div>

                    <div class="mb-8">
                        <p class="text-gray-900 font-medium mb-2">Still have questions?</p>
                        <a href="#" class="text-gray-900 font-medium hover:underline flex items-center">
                            Talk to us <span class="ml-2">→</span>
                        </a>
                    </div>

                    <a href="#"
                        class="inline-block bg-[#B11E38] text-white px-8 py-3 rounded-full font-bold text-sm tracking-wide transition-transform hover:scale-105 active:scale-95 shadow-md">
                        GET A QUOTE
                    </a>
                </div>

                <div class="lg:col-span-8">
                    <p class="text-gray-600 text-sm leading-relaxed mb-10">
                        Here are some frequently asked questions about our product development services, answered to help
                        you understand our process and capabilities better.
                    </p>

                    <div class="space-y-0 border-t border-gray-200">
                        @foreach ($faqs as $key => $faq)
                            <details class="group border-b border-gray-200" {{ $key == 0 ? 'open' : '' }}>
                                <summary class="flex justify-between items-center py-5 cursor-pointer list-none">
                                    <span class="text-gray-900 font-medium group-open:text-[#B11E38] transition-colors">
                                        {{ $faq->question }}
                                    </span>
                                    <span class="text-[#B11E38] transition-transform duration-300 group-open:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </span>
                                </summary>

                                <div class="pb-5 text-stone-800 text-sm leading-relaxed">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </details>
                        @endforeach
                    </div>

                    <div class="mt-8 text-center">
                        <a href="#"
                            class="text-gray-900 text-sm font-semibold hover:text-[#B11E38] transition-colors">
                            View More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Quote Banner --}}
    <section class="relative py-16 px-6 sm:px-12 lg:px-24 overflow-hidden min-h-[400px] flex items-center">

        {{-- Background Image --}}
        <div class="absolute top-0 right-0 w-full h-full">
            <img src="{{ isset($banner) && $banner->image ? asset('storage/' . $banner->image) : asset('images/home/Rectangle42.png') }}"
                alt="FAQ Banner" class="w-full h-full object-cover object-right" />
        </div>

        <div class="relative z-10 max-w-7xl mx-auto w-full">
            <div class="max-w-[400px]">

                {{-- Title --}}
                <h2 class="text-white text-4xl md:text-5xl font-semibold tracking-wide uppercase leading-tight mb-4">
                    {{ isset($banner) && $banner->title ? $banner->title : "Let's Innovate Together" }}
                </h2>

                <div class="w-16 h-0.5 bg-white mb-8"></div>

                <a href="#"
                    class="inline-block bg-white text-[#B11E38] px-10 py-3 rounded-full font-bold text-sm tracking-widest transition-all duration-300 hover:bg-gray-100 hover:shadow-lg active:scale-95">
                    GET A QUOTE
                </a>

            </div>
        </div>

    </section>
    @include('frontend.components.getintouch')




@endsection
