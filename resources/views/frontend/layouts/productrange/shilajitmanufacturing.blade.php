@extends('frontend.app')

@section('content')
    {{-- hero section --}}
    <section class="relative z-20">
        <div class="relative w-full h-full ">

            <!-- Background Image -->
            <img src="{{ asset('images/prbanner1.png') }}" alt="Private Labelling Banner"
                class=" w-full object-cover object-center">

            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-start h-full px-6">

                <div class="relative text-start uppercase tracking-tight lg:max-w-2xl md:max-w-[250px] max-w-[200px]">

                    <!-- Title -->
                    <h1 class="text-lg md:text-4xl lg:text-6xl font-medium  leading-tight">
                        Pure Himalayan Shilajit <span class="text-primaryText">Unfiltered Strength</span>
                    </h1>


                    <!-- Decorative Triangle -->
                    {{-- <div
                        class="hidden md:block absolute -top-2 -right-2 
                    w-0 h-0
                    border-l-[10px] border-l-transparent
                    border-b-[14px] border-b-[#B11E38]
                    rotate-[35deg]">
                    </div> --}}

                </div>

            </div>

        </div>
    </section>

    <!-- Our Products Section -->
    <section class="max-w-7xl mx-auto px-4 py-16 md:py-24 border-b border-gray-100">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-4xl font-semibold text-[#B11E38] tracking-tight uppercase">
                Our Products
            </h2>
            <div class="h-0.5 w-16 bg-gray-300 mx-auto mt-4"></div>
        </div>

        <!-- Product List -->
        <div class=" container mx-auto flex flex-col justify-center items-center ">

            <!-- Product 1: Trifala Mix (Image Left, Text Right) -->
            <div class="flex flex-col lg:flex-row  gap-10 items-center">
                <div class="max-w-[424px] max-h-[424px] min-w-[224px] min-h-[224px]  flex justify-center">
                    <img src="{{ asset('images/AgniTapi-Fe1.png') }}" alt="Shilajit Trifala Mix"
                        class="w-full h-full object-cover object-center">
                </div>
                <div class="w-full  space-y-6  ">
                    <h3 class="text-[20px] md:text-4xl font-semibold text-black uppercase leading-tight tracking-tight text-justify lg:text-left max-sm:text-nowrap">
                        Himalayan Shilajit Trifala <br> Mix Iron Grade
                    </h3>
                    <div class="space-y-6 text-justify text-[16px] max-w-[700px]">
                        <p class="text-stone-800 text-[16px] leading-relaxed text-justify">
                            More than a supplement, our Shilajit is a geological miracle, a dense mineral resin exuded from
                            high-altitude Himalayan rock strata. Harvested meticulously by our dedicated network of
                            high-altitude harvesters, the raw material is purified in our certified facility under the
                            supervision of Ayurvedic experts.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Product 2: Gold Grade (Image Right, Text Left) -->
            <div class="flex flex-col lg:flex-row  gap-10 items-center">

                <div class="w-full space-y-6 order-2 ">
                    <h3 class="text-[20px] md:text-4xl font-semibold text-black uppercase leading-tight tracking-tight text-justify lg:text-left max-sm:text-nowrap">
                        Himalayan Shilajit Trifala <br> Mix Iron Grade
                    </h3>
                    <div class="space-y-6 text-justify text-[16px] max-w-[700px]">
                        <p class="text-stone-800 text-[16px] leading-relaxed text-justify">
                            More than a supplement, our Shilajit is a geological miracle, a dense mineral resin exuded from
                            high-altitude Himalayan rock strata. Harvested meticulously by our dedicated network of
                            high-altitude harvesters, the raw material is purified in our certified facility under the
                            supervision of Ayurvedic experts.
                        </p>
                    </div>
                </div>

                <div class="max-w-[424px] max-h-[424px] min-w-[224px] min-h-[224px]  flex justify-center order-1 lg:order-2">
                    <img src="{{ asset('images/AgniTapi-Fe1.png') }}" alt="Shilajit Trifala Mix"
                        class="w-full h-full object-cover object-center">
                </div>
            </div>


        </div>
    </section>

    @include('frontend.components.pagefaq')
    @include('frontend.components.getintouch')
@endsection
