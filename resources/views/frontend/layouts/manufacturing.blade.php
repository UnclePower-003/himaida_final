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
    {{-- <section>
        <div class="relative w-full">
            <img src="{{ asset('images/manufacturing/Rectangle 75 (1).png') }}" alt=""
                class='w-full object-cover object-center'>
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
    </section> --}}
    <section>

        <div class="relative w-full">

            @if (isset($hero->image))
                <img src="{{ asset('storage/' . $hero->image) }}" class="w-full object-cover object-center">
            @else
                <!-- Skeleton Placeholder -->
                <div class="w-full h-[400px] bg-gray-300 animate-pulse"></div>
            @endif

            <!-- Overlay Filter -->
            <div class="absolute inset-0 bg-black/50"></div>

        </div>

    </section>

    {{-- Our Plant --}}
    <section class='relative'>
        <div class="max-w-7xl mx-auto lg:flex  justify-around px-4 py-10 space-y-5">

            <div class="w-full   overflow-hidden flex items-center justify-center border border-gray-100 bg-white">
                @if (isset($plant->image))
                    <img src="{{ asset('storage/' . $plant->image) }}" alt="Manufacturing Plant Facility"
                        class="w-full h-full aspect-square max-w-[455px] md:min-w-[455px] object-cover object-center shadow-md transition-transform duration-500 hover:scale-105" />
                @endif
            </div>

            <div class=" bg-white flex flex-col justify-center px-3 lg:p-16">
                <h2 class="text-3xl md:text-4xl font-semibold uppercase tracking-tight  mb-4">
                    {{ $plant->title ?? '' }}
                </h2>

                <div class="w-24 h-0.5 bg-gray-400 mb-8"></div>

                <div class="space-y-6 text-justify">
                    @if (isset($plant->descriptions))
                        @foreach ($plant->descriptions as $desc)
                            <p class="text-[18px] leading-relaxed">{{ $desc }}</p>
                        @endforeach
                    @endif
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
                    @foreach ($leftHighlights as $item)
                        <li class="flex items-start">
                            <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                            <span class="text-stone-800 text-[16px] leading-relaxed">
                                {{ $item->description }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                <div class="hidden md:block w-0 border-l border-dashed border-gray-300 self-stretch"></div>

                <ul class="space-y-4 flex-1 max-w-xl text-justify">
                    @foreach ($rightHighlights as $item)
                        <li class="flex items-start">
                            <span class="text-[#B11E38] mr-3 mt-1 font-bold">»</span>
                            <span class="text-stone-800 text-[16px] leading-relaxed">
                                {{ $item->description }}
                            </span>
                        </li>
                    @endforeach
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
                    @foreach ($certifications as $item)
                        <div class="flex flex-col items-center justify-center p-8 text-center space-y-3">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="" class='h-20'>
                            <span class="text-sm font-semibold text-black uppercase tracking-wide"> {{ $item->title }}</span>
                        </div>
                    @endforeach


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
