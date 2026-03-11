@extends('frontend.app')

@section('content')
    {{-- hero section --}}
    <section class="relative z-20">
        <div class="relative w-full h-full ">

            <!-- Background Image -->
            <img src="{{ asset('images/partner/BANNNER 1 (1).png') }}" alt="Private Labelling Banner"
                class=" w-full object-cover object-center">



            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center h-full px-6">

                <div class="relative text-center uppercase tracking-tight max-w-4xl">

                    <!-- Title -->
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold  leading-tight">
                        WHEN YOU PARTNER WITH THE <span class="text-primaryText">BEST</span>
                    </h1>
                    <!-- Subtitle -->
                    <p class="mt-3 text-lg sm:text-2xl md:text-[38px]  font-semibold">
                        YOU GET THE BEST
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

    <section class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="max-w-6xl text-justify">

            <!-- Heading Group -->
            <div class="mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-black tracking-tight uppercase">
                    Partnership Opportunities
                </h2>
                <!-- Accent Underline -->
                <div class="h-0.5 w-16 bg-gray-400 mt-4"></div>
            </div>

            <!-- Text Content -->
            <div class="space-y-8 text-stone-800 leading-relaxed text-[18px]">
                <p>
                    Himaida is emerging as one of the most trusted and forward-thinking wellness companies, committed to quality, innovation, and meaningful collaboration. As a rapidly growing organization, we believe in
                    building strong partnerships with stakeholders across the value chain directly and indirectly to create
                    lasting impact.
                </p>

                <p>
                    At Himaida, we stand by the philosophy of partnership and progress. By working closely with our
                    collaborators, we aim to meet shared business goals while unlocking new opportunities in markets,
                    products, and technologies. Together, we strive to push industry boundaries and shape a future that goes
                    beyond expectations.
                </p>

                <p class="font-medium">
                    Let's partner, innovate, and grow to new heights together.
                </p>
            </div>

            <!-- Action Button -->
            <div class="mt-10">
                <button
                    class="bg-[#B11E38] hover:bg-[#8E182D] text-white px-8 py-3 rounded-full font-bold text-sm transition-all transform hover:scale-105 shadow-md">
                    Lets Connect
                </button>
            </div>

        </div>
    </section>

    @include('frontend.components.getintouch')
@endsection
