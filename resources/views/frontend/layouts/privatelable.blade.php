@extends('frontend.app')

@section('content')
    {{-- hero section --}}
    @if ($hero)
        <section class="relative z-20">

            <div class="relative w-full h-full">

                @if ($hero->image)
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Private Labelling Banner"
                        class="w-full object-cover object-center">
                @endif

                <div class="absolute inset-0 flex items-center justify-center h-full px-6">

                    <div class="relative text-center uppercase tracking-tight max-w-4xl">

                        <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold leading-tight">
                            {{ $hero->title }}
                            <span class="text-primaryText">
                                {{ $hero->highlight_text }}
                            </span>
                        </h1>

                        <p class="mt-3 text-lg sm:text-2xl md:text-[38px] font-semibold">
                            {{ $hero->subtitle }}
                        </p>
                        <!-- Decorative Triangle -->
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
    @endif

    <div class="max-w-7xl mx-auto py-10 flex flex-col justify-center space-y-8 px-3">
        <h1 class='max-w-[650px] text-3xl md:text-4xl lg:text-5xl uppercase font-semibold'>Offering the Best Private
            Labelling Service</h1>
        <div class="h-0.5 w-20 bg-gray-400"></div>
        <p class='text-justify text-[20px] tracking-wide'>Scale your business with our premium, ethically sourced Himalayan
            products. We offer tailored solutions for distributors, brands, and retailers worldwide.</p>
    </div>
    {{-- Private Labelling --}}
    {{-- <section class="bg-white py-16 px-4 ">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="w-full flex justify-center p-5">
                <img src="{{ asset('images/privatelable/honey.png') }}" alt="Private Labelling Honey Jar"
                    class="aspect-square object-cover object-center" />
            </div>

            <div class="flex flex-col">
                <h2 class="text-4xl md:text-5xl font-semibold uppercase tracking-tight">
                    Private Labelling
                </h2>

                <div class="w-20 h-0.5 bg-gray-500 mt-4 mb-8"></div>

                <div class="space-y-6">
                    <p class="text-[18px] leading-relaxed">
                        Your Brand, Our Excellence. Launch your own premium product line instantly.
                        Choose from our world-class catalog, from Mad Honey to Shilajit, ready for
                        your custom branding and bespoke packaging.
                    </p>

                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <span class="text-[#C9962A] mr-2">•</span>
                            <span class="text-stone-800 text-[16px] leading-relaxed">Low MOQs,</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#C9962A] mr-2">•</span>
                            <span class="text-stone-800 text-[16px] leading-relaxed">Rapid market entry,</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-[#C9962A] mr-2">•</span>
                            <span class="text-stone-800 text-[16px] leading-relaxed">End-to-end design support.</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section> --}}

    @if (isset($privateLabelling) &&
            ($privateLabelling->title || $privateLabelling->description || !empty($privateLabelling->points)))
        <section class="bg-white py-16 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="w-full flex justify-center p-5">
                    @if ($privateLabelling->image)
                        <img src="{{ asset('storage/' . $privateLabelling->image) }}"
                            class="aspect-square object-cover object-center" alt="Private Labelling Image">
                    @endif
                </div>

                <div class="flex flex-col">

                    @if ($privateLabelling->title)
                        <h2 class="text-4xl md:text-5xl font-semibold uppercase tracking-tight">
                            {{ $privateLabelling->title }}
                        </h2>
                        <div class="w-20 h-0.5 bg-gray-500 mt-4 mb-8"></div>
                    @endif

                    @if ($privateLabelling->description)
                        <p class="text-[18px] leading-relaxed">
                            {{ $privateLabelling->description }}
                        </p>
                    @endif

                    @if (!empty($privateLabelling->points))
                        <ul class="space-y-3 mt-6">
                            @foreach ($privateLabelling->points as $point)
                                <li class="flex items-start">
                                    <span class="text-[#C9962A] mr-2">•</span>
                                    <span class="text-stone-800 text-[16px] leading-relaxed">
                                        {{ $point }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>

            </div>
        </section>
    @endif

    {{-- Distributorship --}}
    {{-- <section class="bg-[#F4F4F4] py-12 px-4 ">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10 ">

            <div class="lg:aspect-square  flex flex-col justify-center">
                <h2 class="text-3xl md:text-4xl font-semibold  mb-6">Distributorship</h2>
                <p class="= text-[18px] max-w-[450px] text-justify leading-relaxed mb-6">
                    Own Your Territory, become an authorized global partner for our established brands like Best Mad Honey
                    and Herbopal. Join a network that spans over 70 countries and brings authentic wellness to new markets.
                </p>
                <ul class="space-y-3 = text-[16px]  tracking-tighter">
                    <li class="flex items-center"><span class="mr-2 text-[#C9962A]">•</span> Marketing & Sales Support</li>
                    <li class="flex items-center"><span class="mr-2 text-[#C9962A]">•</span> Volume Tier Discounts</li>
                    <li class="flex items-center"><span class="mr-2 text-[#C9962A]">•</span> Priority Supply Chain</li>
                </ul>
            </div>

            <div class="lg:aspect-square  flex items-center justify-center  ">
                <img src="{{ asset('images/privatelable/privatelabel 1.png') }}" alt="Honey Jar"
                    class="max-w-full max-h-full object-contain">
            </div>

            <div class="lg:aspect-square  flex flex-col justify-center pl-10  ">
                <div class="mb-8">
                    <h4 class="text-stone-800 text-[20px] leading-tight ">
                        Avail The Best Distributorship<br />Manufacturing Services
                    </h4>
                    <div class="w-20 h-px bg-black mt-4"></div>
                </div>

                <div class="space-y-6">
                    <a href="tel:+9779802372074" class="flex items-center group">
                        <div
                            class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center mr-4 group-hover:bg-[#B11E38] transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79a15.1 15.1 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.27 11.72 11.72 0 00.59 3.7 1 1 0 01-1 1A19 19 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.7 1 1 0 01-.27 1.11z" />
                            </svg>
                        </div>
                        <span class="text-lg">+977-980-2372074</span>
                    </a>

                    <a href="mailto:info@Himaida.com" class="flex items-center group">
                        <div
                            class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center mr-4 group-hover:bg-[#B11E38] transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                        </div>
                        <span class="text-lg">info@Himaida.com</span>
                    </a>
                </div>
            </div>

        </div>
    </section> --}}

    @if (isset($distributorship) &&
            ($distributorship->title || $distributorship->description || !empty($distributorship->points)))
        <section class="bg-[#F4F4F4] py-12 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- Title / Description / Points --}}
                <div class="lg:aspect-square flex flex-col justify-center">
                    @if ($distributorship->title)
                        <h2 class="text-3xl md:text-4xl font-semibold mb-6">{{ $distributorship->title }}</h2>
                    @endif

                    @if ($distributorship->description)
                        <p class="text-[18px] max-w-[450px] text-justify leading-relaxed mb-6">
                            {{ $distributorship->description }}</p>
                    @endif

                    @if (!empty($distributorship->points))
                        <ul class="space-y-3 text-[16px] tracking-tighter">
                            @foreach ($distributorship->points as $point)
                                <li class="flex items-center">
                                    <span class="mr-2 text-[#C9962A]">•</span> {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Image --}}
                <div class="lg:aspect-square flex items-center justify-center">
                    @if ($distributorship->image)
                        <img src="{{ asset('storage/' . $distributorship->image) }}" alt="Distributorship Image"
                            class="max-w-full max-h-full object-contain">
                    @endif
                </div>

                {{-- Contacts --}}
                <div class="lg:aspect-square flex flex-col justify-center pl-10">
                    <div class="mb-8">
                        <h4 class="text-stone-800 text-[20px] leading-tight ">
                            Avail The Best Distributorship<br />Manufacturing Services
                        </h4>
                        <div class="w-20 h-px bg-black mt-4"></div>
                    </div>
                    @if (!empty($distributorship->contacts))
                        <div class="space-y-6">
                            @foreach ($distributorship->contacts as $contact)
                                <div class="flex items-center group">
                                    @if ($contact['icon'])
                                        <div
                                            class=" w-12 h-12 bg-black rounded-full p-4 flex justify-center items-center mr-4 text-center">
                                            <img src="{{ asset('storage/' . $contact['icon']) }}" class=" w-auto h-auto ">
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center mr-4">
                                            ?</div>
                                    @endif
                                    <span class="text-lg">{{ $contact['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </section>
    @endif
    {{-- Contract Manufacturing. --}}
    <section class="bg-white py-12 px-4">

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="aspect-square bg-white flex flex-col justify-center">

                <h2 class="text-3xl md:text-4xl font-semibold leading-tight mb-4">
                    {{ $contract->title ?? '' }}
                </h2>

                <div class="w-16 h-1 bg-[#C9962A] mb-8"></div>

                <div class="space-y-6">

                    <p class="text-stone-800 text-[18px] leading-relaxed">
                        {{ $contract->description ?? '' }}
                    </p>

                    <ul class="space-y-3">

                        @if (isset($contract->points))
                            @foreach ($contract->points as $point)
                                <li class="flex items-start">

                                    <span class="text-[#C9962A] mr-2 text-lg leading-none">•</span>

                                    <span class="text-stone-800 text-[16px] leading-relaxed">
                                        {{ $point }}
                                    </span>

                                </li>
                            @endforeach
                        @endif

                    </ul>

                </div>

            </div>


            <div class="aspect-square bg-white flex items-center justify-center md:px-10 lg:px-14">

                <div
                    class="w-full h-full bg-stone-50 rounded-t-full flex items-end justify-center overflow-hidden shadow-inner border border-gray-100">

                    @if (isset($contract->image))
                        <img src="{{ asset('storage/' . $contract->image) }}" class="w-full h-auto object-cover">
                    @endif

                </div>

            </div>

        </div>

    </section>
    {{-- FAQ --}}
    @include('frontend.components.pagefaq')

    @include('frontend.components.getintouch')
@endsection
