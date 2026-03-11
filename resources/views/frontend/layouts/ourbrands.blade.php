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
        <div class="relative w-full h-full ">

            <!-- Background Image -->
            <img src="{{ asset('images/privatelable/BANNNER.png') }}" alt="Private Labelling Banner"
                class=" w-full object-cover object-center">



            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center h-full px-6">

                <div class="relative text-center uppercase tracking-tight max-w-4xl">

                    <!-- Title -->
                    <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold  leading-tight">
                        So Many <span class="text-primaryText">Choices</span>
                        <br>
                        So Many <span class="text-primaryText">Smiles</span>
                    </h1>


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

    <!-- Himalaya's Own Brand Spotlight -->
    <section>
        <div class="max-w-7xl mx-auto px-6">

            <!-- Top Section: Header & Intro -->
            <div class=" pt-12">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl font-semibold text-gold text-center uppercase tracking-tighter mb-12">
                    1. HIMALAYAS OWN
                </h1>

                <div class="max-w-7xl mx-auto  px-4 py-10 space-y-5 lg:flex justify-between border-t border-gray-300">
                    <!-- Brand Image -->

                    <img src="{{ asset('images/ourbrands/brand1.png') }}" alt="Himalayas Own Product Range"
                        class="min-w-[361px] min-h-[361px] max-w-[361px] max-h-[361pxx]  object-cover object-center  transition-transform duration-500 hover:scale-105"
                        onerror="this.src='https://via.placeholder.com/600x400?text=Product+Collection'">


                    <!-- Brand Description -->
                    <div class=" bg-white flex flex-col justify-center px-3 lg:p-16">
                        <p class="text-stone-800 text-[16px] leading-relaxed text-justify">
                            Himalayas Own is a premium brand dedicated to bringing the finest natural treasures from the
                            heart
                            of the Himalayas. Specializing in Himalayan tea, coffee, shilajit, local honey, cliff honey, mad
                            honey, and rare herbs, the brand truly lives up to its name, offering products that are
                            authentically Himalayas' own. With a focus on purity, sustainability, and cultural heritage,
                            Himalayas Own connects people worldwide to the rich flavors and wellness secrets of the
                            Himalayan
                            region.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Bottom Section: Range & Tags -->
            <div class="grid grid-cols-1 md:grid-cols-3 border-b border-t border-gray-200">

                <!-- Left: Label -->
                <div class="flex items-center justify-center py-12 border-b md:border-b-0 md:border-r border-gray-200">
                    <span class="text-black font-medium text-lg">Our Product Range</span>
                </div>

                <!-- Middle: Circular Logo -->
                <div class="flex items-center justify-center py-8 border-b md:border-b-0 md:border-r border-gray-200">

                    <img src="{{ asset('images/manufacturing/arch.png') }}" alt=""
                        class='object-cover object-center w-[300px] h-[300px] rounded-full'>

                </div>

                <!-- Right: Product Tags -->
                <div class="flex items-center justify-center p-8">
                    <div class="flex flex-wrap gap-3 justify-center">
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Spices
                        </span>
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Coffee
                        </span>
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Honey
                        </span>
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Tea
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6">

            <!-- Top Section: Header & Intro -->
            <div class=" pt-12">
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl font-semibold text-gold text-center uppercase tracking-tighter mb-12">
                    1. HIMALAYAS OWN
                </h1>

                <div class="max-w-7xl mx-auto  px-4 py-10 space-y-5 lg:flex justify-between border-t border-gray-300">
                    <!-- Brand Image -->

                    <img src="{{ asset('images/ourbrands/brand1.png') }}" alt="Himalayas Own Product Range"
                        class="min-w-[361px] min-h-[361px] max-w-[361px] max-h-[361pxx]  object-cover object-center  transition-transform duration-500 hover:scale-105"
                        onerror="this.src='https://via.placeholder.com/600x400?text=Product+Collection'">


                    <!-- Brand Description -->
                    <div class=" bg-white flex flex-col justify-center px-3 lg:p-16">
                        <p class="text-stone-800 text-[16px] leading-relaxed text-justify">
                            Himalayas Own is a premium brand dedicated to bringing the finest natural treasures from the
                            heart
                            of the Himalayas. Specializing in Himalayan tea, coffee, shilajit, local honey, cliff honey, mad
                            honey, and rare herbs, the brand truly lives up to its name, offering products that are
                            authentically Himalayas' own. With a focus on purity, sustainability, and cultural heritage,
                            Himalayas Own connects people worldwide to the rich flavors and wellness secrets of the
                            Himalayan
                            region.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Bottom Section: Range & Tags -->
            <div class="grid grid-cols-1 md:grid-cols-3 border-b border-t border-gray-200">

                <!-- Left: Label -->
                <div class="flex items-center justify-center py-12 border-b md:border-b-0 md:border-r border-gray-200">
                    <span class="text-black font-medium text-lg">Our Product Range</span>
                </div>

                <!-- Middle: Circular Logo -->
                <div class="flex items-center justify-center py-8 border-b md:border-b-0 md:border-r border-gray-200">

                    <img src="{{ asset('images/manufacturing/arch.png') }}" alt=""
                        class='object-cover object-center w-[300px] h-[300px] rounded-full'>

                </div>

                <!-- Right: Product Tags -->
                <div class="flex items-center justify-center p-8">
                    <div class="flex flex-wrap gap-3 justify-center">
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Spices
                        </span>
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Coffee
                        </span>
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Honey
                        </span>
                        <span
                            class="px-3 py-[3px] items-center text-center flex justify-center border border-gray-300 rounded-full text-stone-800 text-sm font-medium hover:border-gold hover:text-gold transition-colors cursor-default">
                            Tea
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('frontend.components.getintouch')
@endsection
