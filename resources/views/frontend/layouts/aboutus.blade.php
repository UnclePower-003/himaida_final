@extends('frontend.app')

@section('content')
    {{-- herosection --}}
    @if ($whoweare)
        <section class=" py-20 px-6">
            <div class="container mx-auto">
                <!-- Title -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-semibold uppercase tracking-tight">
                        {{ $whoweare->title ?? 'WHO WE ARE?' }}</h2>
                    <div class="w-16 h-[2px] bg-gray-400 mx-auto mt-3"></div>
                </div>

                <div class="w-full flex flex-col lg:flex-row space-y-10 lg:space-y-0">

                    <!-- LEFT SIDE -->
                    <div class="lg:w-1/2 lg:pr-10 relative flex items-center justify-center p-3">

                        <div class="grid grid-cols-2 w-full lg:max-w-[600px]">

                            <!-- Image 1 -->
                            <div class="aspect-square">
                                @if ($whoweare->image1)
                                    <img src="{{ asset('uploads/whoweare/' . $whoweare->image1) }}"
                                        class="h-full w-full object-cover shadow-md">
                                @endif
                            </div>

                            <!-- Empty block -->
                            <div class="aspect-square"></div>

                            <!-- Text block -->
                            <div class="aspect-square flex flex-col justify-center text-center items-center">
                                @if ($whoweare->year_number)
                                    <h3 class="text-4xl md:text-5xl font-bold leading-none">{{ $whoweare->year_number }}
                                    </h3>
                                @endif
                                @if ($whoweare->year_text)
                                    <span
                                        class="text-3xl md:text-5xl font-black uppercase tracking-[0.2em] text-transparent [-webkit-text-stroke:1.5px_#000] opacity-100">
                                        {{ $whoweare->year_text }}
                                    </span>
                                @endif
                            </div>

                            <!-- Image 2 -->
                            <div class="aspect-square">
                                @if ($whoweare->image2)
                                    <img src="{{ asset('uploads/whoweare/' . $whoweare->image2) }}"
                                        class="h-full w-full object-cover shadow-md">
                                @endif
                            </div>

                        </div>

                    </div>
                    <!-- RIGHT SIDE -->
                    <div class="lg:w-1/2 relative lg:pl-10 flex flex-col items-center justify-center">

                        <!-- Vertical Divider -->
                        <div class="hidden lg:block absolute left-0 top-0 h-full w-[1px] bg-gray-300"></div>

                        <div class="font-[400] leading-relaxed space-y-6 text-[16px] text-justify lg:max-w-[600px]">

                            @if ($whoweare->description1)
                                <p>
                                    {{ $whoweare->description1 }}
                                </p>
                            @endif

                            @if ($whoweare->description2)
                                <p>
                                    {{ $whoweare->description2 }}
                                </p>
                            @endif

                        </div>

                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- Visiona and core value --}}
    <section class="relative bg-[#FAFAFA]">

        <!-- Left Decorative Image -->
        <img src="{{ asset('images/aboutus/SDA1.png') }}"
            class="absolute left-0 -top-20 h-[460px] w-[259px] hidden lg:block z-10">

        <!-- Vision & Mission -->
        @if ($visionMission)
            <div class="max-w-7xl flex justify-center items-center mx-auto px-6 py-20">
                <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 lg:pl-20">

                    <div class="max-w-[400px]">

                        <img src="{{ asset('uploads/visionmission/' . $visionMission->vision_icon) }}"
                            class="min-h-16 min-w-16 object-cover p-2">

                        <h2 class="text-5xl font-semibold uppercase">
                            {{ $visionMission->vision_title }}
                        </h2>

                        <div class="h-0.5 w-[100px] my-5 bg-gray-500"></div>

                        <p class="text-lg text-justify">
                            {{ $visionMission->vision_description }}
                        </p>

                    </div>


                    <div class="max-w-[400px]">

                        <img src="{{ asset('uploads/visionmission/' . $visionMission->mission_icon) }}"
                            class="min-h-16 min-w-16 object-cover p-2">

                        <h2 class="text-5xl font-semibold uppercase">
                            {{ $visionMission->mission_title }}
                        </h2>

                        <div class="h-0.5 w-[100px] my-5 bg-gray-500"></div>

                        <p class="text-lg text-justify">
                            {{ $visionMission->mission_description }}
                        </p>

                    </div>

                </div>
            </div>
        @endif


        <!-- Divider Quote -->
        <div
            class="flex flex-col sm:flex-row items-center gap-4 px-6 sm:px-12 mb-16 max-w-7xl mx-auto text-center sm:text-left">

            <div class="h-[1px] w-full bg-black hidden sm:block"></div>

            <span class="text-primaryText italic font-semibold font-serif lg:text-nowrap">
                Driven by quality, trust, and long-term commitment.
            </span>

            <div class="h-[1px] w-full bg-black hidden sm:block"></div>

        </div>


        <!-- CORE VALUES -->
        {{-- <div class="max-w-7xl mx-auto px-6 pb-20">

            <!-- Title -->
            <div class="text-center mb-14">
                <h2 class="text-3xl font-semibold uppercase">Our Core Value</h2>
                <div class="w-16 h-[2px] bg-gray-400 mx-auto mt-4"></div>
            </div>


            <!-- Core Value Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Item -->
                <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">
                    <img src="{{ asset('images/aboutus/core/Group 16 (1).png') }}" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">Innovation</h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

                <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">
                    <img src="{{ asset('images/aboutus/core/Vector (14).png') }}" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">Integrity</h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

                <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">
                    <img src="/icons/transparency.svg" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">Transparency</h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

                <div class="flex flex-col items-center text-center p-8 border-b border-gray-300">
                    <img src="/icons/decision.svg" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">
                        Participative Decision Making
                    </h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>


                <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">
                    <img src="/icons/society.svg" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">
                        Concern for Society
                    </h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

                <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">
                    <img src="/icons/respect.svg" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">
                        Respect for People
                    </h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

                <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">
                    <img src="/icons/excellence.svg" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">
                        Passion for Excellence
                    </h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

                <div class="flex flex-col items-center text-center p-8 border-b border-gray-300">
                    <img src="/icons/nation.svg" class="h-10 mb-4">
                    <h3 class="uppercase text-lg font-semibold">
                        Nation Orientation
                    </h3>
                    <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>
                </div>

            </div>

        </div> --}}
        <!-- CORE VALUES -->
        <div class="max-w-7xl mx-auto px-6 pb-20">

            <div class="text-center mb-14">
                <h2 class="text-3xl font-semibold uppercase">
                    Our Core Value
                </h2>
                <div class="w-16 h-[2px] bg-gray-400 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($corevalues as $value)
                    <div class="flex flex-col items-center text-center p-8 border-b lg:border-r border-gray-300">

                        <img src="{{ asset('uploads/corevalues/' . $value->icon) }}" class="h-10 mb-4">

                        <h3 class="uppercase text-lg font-semibold">
                            {{ $value->title }}
                        </h3>

                        <div class="h-[1px] w-24 bg-gray-200 mt-4"></div>

                    </div>
                @endforeach

            </div>

        </div>

        <img src="{{ asset('images/aboutus/SDA 2.png') }}" class="absolute right-0 -bottom-20 h-100 hidden lg:block z-10">

    </section>

    {{-- Manufacturing --}}
    {{-- <section class="bg-white py-16 px-4 md:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="flex flex-col items-center space-y-6">
                <div class="w-full border-t border-gray-300 pt-4 text-center">
                    <h3 class="uppercase tracking-[0.3em] font-medium text-black">
                        Superior Manufactring Capabilites
                    </h3>
                </div>

                <div class="w-full">
                    <img src="{{ asset('images/aboutus/Rectangle 60.png') }}" alt="Honey production line"
                        class="w-full h-auto object-cover" />
                </div>

                <div class="w-full border-b border-gray-300 pb-4 text-center">
                    <h3 class="uppercase tracking-[0.3em] font-medium text-black">
                        To Meet Every Demand
                    </h3>
                </div>
            </div>

            <div class="flex flex-col">
                <h2 class="text-4xl md:text-5xl font-bold text-black uppercase leading-tight">
                    Manufacturing<br />Excellence
                </h2>

                <div class="w-16 h-1 bg-[#C9962A] mt-6 mb-10"></div>

                <div class="space-y-6 text-stone-800">
                    <p class="text-lg leading-relaxed">
                        Himaida is a prominent manufacturer and supplier of premium honey and honey-based products, catering
                        to private label and third-party contract manufacturing requirements. Backed by advanced
                        infrastructure and deep industry expertise, we deliver consistent quality tailored to diverse market
                        needs.
                    </p>

                    <p class="text-lg leading-relaxed">
                        Our state-of-the-art manufacturing facility operates under strict GMP guidelines and features a
                        hygienically designed production plant, an in-house laboratory, and a dedicated R&D research and
                        development center equipped with ultra-modern tools. Supported by an eco-friendly work environment,
                        advanced machinery, and a team of qualified and experienced professionals, we ensure purity, safety,
                        and excellence at every stage of production.
                    </p>
                </div>
            </div>

        </div>
    </section> --}}
    @if ($manufacturing)
        <section class="bg-white py-16 px-4 md:px-8">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="flex flex-col items-center space-y-6">

                    <div class="w-full border-t border-gray-300 pt-4 text-center">
                        <h3 class="uppercase tracking-[0.3em] font-medium text-black">
                            {{ $manufacturing->top_text }}
                        </h3>
                    </div>

                    <div class="w-full">
                        <img src="{{ asset('storage/' . $manufacturing->image) }}" class="w-full h-auto object-cover">
                    </div>

                    <div class="w-full border-b border-gray-300 pb-4 text-center">
                        <h3 class="uppercase tracking-[0.3em] font-medium text-black">
                            {{ $manufacturing->bottom_text }}
                        </h3>
                    </div>

                </div>

                <div class="flex flex-col">

                    <h2 class="text-4xl md:text-5xl font-bold text-black uppercase leading-tight">
                        {!! nl2br($manufacturing->title) !!}
                    </h2>

                    <div class="w-16 h-1 bg-[#C9962A] mt-6 mb-10"></div>

                    <div class="space-y-6 text-stone-800">

                        <p class="text-lg leading-relaxed">
                            {{ $manufacturing->description_one }}
                        </p>

                        <p class="text-lg leading-relaxed">
                            {{ $manufacturing->description_two }}
                        </p>

                    </div>

                </div>

            </div>
        </section>
    @endif
    {{-- Certifications & Compliance --}}
    <section class="bg-white pt-10 px-4">
        <div class="max-w-7xl mx-auto text-center">

            <h2 class="text-3xl md:text-4xl font-medium uppercase tracking-tight">
                Certifications & Compliance
            </h2>

            <div class="w-20 h-0.5 bg-gray-400 mx-auto mt-4 mb-6"></div>

            <p class="max-w-2xl mx-auto  text-[18px] leading-relaxed mb-12">
                These certifications ensure that all our product, from honey to shilajit and herbs,
                meet strict health, hygiene, and quality standards recognized worldwide.
            </p>

            @include('frontend.components.certificationscomponent')
        </div>
    </section>

    @include('frontend.components.getintouch')
@endsection
