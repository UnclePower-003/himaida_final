@extends('frontend.app')
@section('content')
    {{-- hero section --}}
    <section class="relative z-20">
        <div class="relative w-full h-full ">
            <!-- Background Image -->
            <img src="{{ asset('images/suppliment.png') }}" alt="Private Labelling Banner"
                class=" w-full object-cover object-center">
        </div>
    </section>

    <!-- Our Products - Herbal Capsules Section -->
    <section class='relative'>
        <img src="{{ asset('images/aboutus/SDA1.png') }}" alt=""
            class='absolute inset-0 h-20 md:h-48 top-28 z-10 md:top-16'>
        <div class="max-w-7xl mx-auto px-4 py-16 md:py-24">

            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-[#B11E38] tracking-tight uppercase">
                    Our Products
                </h2>
                <div class="h-0.5 w-16 bg-gray-300 mx-auto mt-4"></div>
            </div>

            <!-- Product List -->
            <div class=" container mx-auto flex flex-col justify-center items-center ">

                <!-- Product 1: Cordyceps (Text Left [2/3], Image Right [1/3]) -->
                <div class="flex flex-col lg:flex-row  gap-10 items-center ">
                    
                    <div class="w-full  space-y-6">
                        <h3 class="text-2xl font-bold text-black uppercase leading-tight">
                            Cordyceps (CS-4 Extract)
                        </h3>
                        <div class="space-y-6 text-justify text-[16px] max-w-[700px]">
                            <p class="text-stone-800 leading-relaxed">
                                Formulated with high-quality Cordyceps sinensis (CS-4) extract, these capsules are
                                engineered to optimize cellular energy. Traditionally used to enhance lung capacity and
                                reproductive
                                vitality, Cordyceps helps promote natural stamina, endurance, and oxygen utilization for
                                peak physical
                                performance.
                            </p>
                            <p class="text-stone-800 leading-relaxed italic">
                                <span class="font-bold text-black not-italic">• Key Benefits:</span> Supports
                                ATP
                                production, respiratory health, and physical stamina.
                            </p>
                        </div>
                    </div>
                   
                    <div class="max-w-[424px] max-h-[424px] min-w-[224px] min-h-[224px]  flex justify-center">
                        <img src="{{ asset('images/suppliment1.png') }}" alt="Cordyceps Capsules"
                            class="w-full h-full object-cover object-center">
                    </div>
                </div>

                <!-- Product 2: Noni (Image Left [1/3], Text Right [2/3]) -->
                <div class="flex flex-col lg:flex-row gap-10 items-center  ">

                    <div class="max-w-[424px] max-h-[424px] min-w-[224px] min-h-[224px]  flex justify-center">
                        <img src="{{ asset('images/suppliment1.png') }}" alt="Cordyceps Capsules"
                            class="w-full h-full object-cover object-center">
                    </div>

                    <div class="w-full  space-y-6">
                        <h3 class="text-2xl font-bold text-black uppercase leading-tight">
                            Cordyceps (CS-4 Extract)
                        </h3>
                        <div class="space-y-6 text-justify text-[16px] max-w-[700px]">
                            <p class="text-stone-800 leading-relaxed">
                                Formulated with high-quality Cordyceps sinensis (CS-4) extract, these capsules are
                                engineered to optimize cellular energy. Traditionally used to enhance lung capacity and
                                reproductive
                                vitality, Cordyceps helps promote natural stamina, endurance, and oxygen utilization for
                                peak physical
                                performance.
                            </p>
                            <p class="text-stone-800 leading-relaxed italic">
                                <span class="font-bold text-black not-italic ">• Key Benefits:</span> Supports
                                ATP
                                production, respiratory health, and physical stamina.
                            </p>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <img src="{{ asset('images/aboutus/SDA 2.png') }}" alt=""
            class='absolute  h-32 md:h-48 right-0 bottom-0 md:bottom-28'>
    </section>

    @include('frontend.components.pagefaq')
    @include('frontend.components.getintouch')
@endsection
