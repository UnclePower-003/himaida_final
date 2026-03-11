@extends('frontend.app')

@section('content')
    @push('style')
        <style>
            /* Custom rounded arch style for the image as seen in the second reference */
            .arch-mask {
                border-top-left-radius: 50% 40%;
                border-top-right-radius: 50% 40%;
                border-bottom-right-radius: 50% 40%;
            }
        </style>
    @endpush
    {{-- header herosection --}}
    <section>
        <div class="relative w-full">
            <img src="{{ asset('images/manufacturing/Rectangle 75 (1).png') }}" alt=""
                class='w-full object-cover object-center'>
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
    </section>
    {{-- Our Plant --}}
    <section class='relative'>
        <div class="max-w-7xl mx-auto lg:flex  justify-around px-4 py-10 space-y-5">

            <div
                class="w-full max-w-[455px] aspect-square overflow-hidden flex items-center justify-center border border-gray-100 bg-white">
                <img src="{{ asset('images/manufacturing/Rectangle 79.png') }}" alt="Manufacturing Plant Facility"
                    class="w-full h-full object-cover object-center shadow-md transition-transform duration-500 hover:scale-105" />
            </div>

            <div class=" bg-white flex flex-col justify-center px-3 lg:p-16">
                <h2 class="text-3xl md:text-4xl font-semibold uppercase tracking-tight  mb-4">
                    Our Plant
                </h2>

                <div class="w-24 h-0.5 bg-gray-400 mb-8"></div>

                <div class="space-y-6 text-justify">
                    <p class="text-[18px] leading-relaxed">
                        Himaida's manufacturing facility is a modern, well-equipped production unit designed to meet
                        high-quality manufacturing standards for honey-based, herbal, and natural wellness products. Our
                        advanced machinery and skilled workforce enable us to develop products that align with global
                        quality expectations.
                    </p>

                    <p class=" text-[18px] leading-relaxed">
                        Our facility is supported by efficient infrastructure and an eco-conscious working environment,
                        reflecting our commitment to sustainability and responsible production.
                    </p>
                </div>
            </div>

        </div>
        <img src="{{ asset('images/manufacturing/image 20.png') }}" alt="" class='absolute  right-0 -bottom-24'>
    </section>
    {{-- Highlights --}}
    <section class="py-24 ">
        <div class="max-w-7xl mx-auto px-6 ">

            <div class="mb-10 text-left">
                <h2 class="text-3xl md:text-4xl font-semibold text-black uppercase tracking-tight">
                    Highlights of Our<br>Manufacturing Plant
                </h2>
                <div class="mt-4 border-t-2 border-gray-300 w-16  "></div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-stretch gap-8 lg:gap-12">

                <ul class="space-y-4 flex-1 max-w-xl text-justify">
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">FDA-compliant Honey Processing
                            Facility</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">GMP, ISO 22000:2018 compliant manufacturing
                            unit</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Average monthly processing capacity: Approx
                            1
                            million packs</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">High-tech honey processing and filling
                            facility
                            designed to prevent contamination</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Processing plants with batch capacities of
                            30kg, 100kg, and 200kg</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">All processing vessels, pipelines, pumps,
                            and
                            contact parts made of SS-316, ensuring no chemical reaction and maintaining honey purity</span>
                    </li>
                </ul>

                <div class="hidden md:block w-0 border-l border-dashed border-gray-300 self-stretch"></div>

                <ul class="space-y-4 flex-1 max-w-xl text-justify">
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Controlled filtration, heating, and
                            moisture
                            management systems to preserve natural enzymes and quality</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Filling facilities for jars, and bulk
                            containers ranging from 1 gm to 6000 gm</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Fully integrated packaging facility
                            including
                            labeling, shrink sleeves, cartons, box wrapping, and strapping</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Separate man and material entry door for
                            processing, filling, and packaging areas</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">In-house laboratory for quality testing,
                            moisture analysis, purity checks, and R&D</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                        <span class="text-stone-800 text-[16px] leading-relaxed">Production zone equipped with dedicated
                            dehumidification systems, and pest control units.</span>
                    </li>
                </ul>

            </div>
        </div>
    </section>
    <!-- Accreditation Section Container -->
    <section class="max-w-7xl mx-auto px-6 py-10 md:py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

            <!-- Left Side: Text Content -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-semibold  tracking-tight uppercase">
                        Accreditation
                    </h2>
                    <!-- Short underline decorative element -->
                    <div class="h-0.5 w-16 bg-gray-400 mt-4"></div>
                </div>

                <div class="space-y-6 text-stone-800 leading-relaxed text-sm md:text-base max-w-lg">
                    <p>
                        Our manufacturing facilities are accredited to government norms and regulations round-the-clock. Our
                        manufacturing facility and lab are in compliance with GMP, ISO 22000:2018 and FDA certified and
                        DFTQC Registered.
                    </p>
                    <p>
                        We adhere to the highest standards of quality and safety.
                    </p>
                </div>
            </div>

            <!-- Right Side: Certification Grid -->
            <div class="lg:col-span-7 relative">
                <!-- Grid Lines (Desktop Only) -->
                <div class="hidden md:block absolute inset-0 pointer-events-none">
                    <!-- Vertical Dotted Line -->
                    <div class="absolute left-1/2 top-0 bottom-0 border-l border-dotted border-gray-400"></div>
                    <!-- Horizontal Dotted Line -->
                    <div class="absolute top-1/2 left-0 right-0 border-t border-dotted border-gray-400"></div>
                </div>

                <!-- Icons Grid -->
                <div class="grid grid-cols-2 gap-y-12 md:gap-y-0">

                    <!-- FDA Certified -->
                    <div class="flex flex-col items-center justify-center p-8 text-center space-y-3">
                        <img src="{{ asset('images/aboutus/FDA 1.png') }}" alt="" class='h-20'>
                        <span class="text-sm font-semibold text-black uppercase tracking-wide">FDA Certified</span>
                    </div>

                    <!-- ISO Certified -->
                    <div class="flex flex-col items-center justify-center p-8 text-center space-y-3">
                        <img src="{{ asset('images/aboutus/ISO 1.png') }}" alt="" class='h-20'>
                        <span class="text-sm font-semibold text-black uppercase tracking-wide">ISO 22000:2018
                            Certified</span>
                    </div>

                    <!-- GMP Certified -->
                    <div class="flex flex-col items-center justify-center p-8 text-center space-y-3">
                        <img src="{{ asset('images/aboutus/GMP Quality Logo Vector 1.png') }}" alt=""
                            class='h-20'>
                        <span class="text-sm font-semibold text-black uppercase tracking-wide">GMP Certified</span>
                    </div>

                    <!-- DFTQC Registered -->
                    <div class="flex flex-col items-center justify-center p-8 text-center space-y-3">

                        <!-- Emblem Style Placeholder -->
                        <img src="{{ asset('images/aboutus/gmp certifiedd-01 1.png') }}" alt="" class='h-20'>
                        <span class="text-sm font-semibold text-black uppercase tracking-wide">DFTQC Registered</span>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Research & Innovation Section -->
    <section class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Left Side: Arched Image -->
            <div class="relative flex justify-center lg:justify-start">
                <div class="w-full max-w-md aspect-[4/5] overflow-hidden arch-mask">
                    <img src="{{ asset('images/manufacturing/arch.png') }}" alt="Laboratory Research"
                        class="w-full h-full object-cover"
                        onerror="this.src='https://via.placeholder.com/800x1000?text=Research+Image'">
                </div>
            </div>

            <!-- Right Side: Text Content -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-semibold text-black tracking-tight uppercase">
                        Research & Innovation
                    </h2>
                    <!-- Short underline decorative element -->
                    <div class="h-0.5 w-16 bg-gray-400 mt-4"></div>
                </div>

                <div class="space-y-5 text-stone-800 leading-relaxed text-[16px] text-justify">
                    <p>
                        At the heart of our operations lies a modern, in-house Research & Innovation (R&I) Laboratory
                        dedicated to maintaining the highest benchmarks of product excellence.
                    </p>
                    <p>
                        Our R&I facility serves as the foundation for our product integrity, allowing us to conduct rigorous
                        in-house testing, bioactive standardization, and stability analysis. This scientific backbone
                        ensures that our natural wellness solutions are not only authentic but consistently reliable.
                    </p>
                    <p>
                        Our multidisciplinary team includes Food Technology Professionals, Ayurvedic Experts, and Quality &
                        Safety specialists, supported by a dedicated group of Food Tech interns. Together, they ensure that
                        our natural wellness solutions are both authentic and scientifically reliable.
                    </p>
                    <p>
                        We don't just source, we innovate. Our laboratory has developed a portfolio of distinctive,
                        high-performance products, including advanced shilajit blends, honey infusions, herbal blends, and
                        customized formulations designed for global markets.
                    </p>
                    <p>
                        This strong research foundation allows us to deliver distinctive and reliable products for private
                        label and third-party partners, making us a trusted leader in Himalayan natural wellness.
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.components.getintouch')

@endsection
