@extends('frontend.app')

@section('content')
    {{-- hero section --}}
    <section class="relative z-20">

        <!-- Hero Container -->
        {{-- <div class="relative w-full h-full ">

            <!-- Background Image -->
            <img src="{{ asset('images/privatelable/BANNNER.png') }}" alt="Private Labelling Banner"
                class=" w-full object-cover object-center">



            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center h-full px-6">

                <div class="relative text-center uppercase tracking-tight max-w-4xl">

                    <!-- Title -->
                    <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold  leading-tight">
                        LET’S ENHANCE <span class="text-primaryText">LIVES</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="mt-3 text-lg sm:text-2xl md:text-[28px]  font-semibold">
                        WITH OUR “WELLNESS” PRODUCTS TOGETHER </p>

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

        </div> --}}
        <div class="relative w-full">
            <!-- Background Image -->
            <img src="{{ $hero?->background_image_url ?? asset('images/privatelable/BANNNER.png') }}"
                alt="Private Labelling Banner" class="w-full h-[60dvh] sm:h-[50dvh] xs:h-[40dvh] object-cover object-center">

            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center h-full px-4 sm:px-6">
                <div class="relative text-center uppercase tracking-tight max-w-4xl px-2">
                    <!-- Title -->
                    <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-bold leading-snug md:leading-tight">
                        {{ $hero?->title_line1 ?? "LET'S ENHANCE" }}
                        <span class="text-primaryText">{{ $hero?->title_highlight ?? 'LIVES' }}</span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="mt-2 sm:mt-3 text-sm sm:text-lg md:text-xl lg:text-[28px] font-semibold">
                        {{ $hero?->subtitle ?? 'WITH OUR "WELLNESS" PRODUCTS TOGETHER' }}
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

    <!-- Main Contact Section -->
    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">

            <!-- Left Side: Contact Information -->
            <div class="space-y-12">
                <!-- Location Header -->
                <div class="flex items-center space-x-4 border-b border-primary pb-6">
                    <div class="w-10 h-10 flex-shrink-0">
                        <!-- Simplified Nepal Flag SVG -->
                        <img src="{{ asset('images/Flag_of_Nepal.svg') }}" alt="">
                    </div>
                    <h2 class="text-3xl font-bold text-[#B11E38]">Nepal</h2>
                </div>

                <!-- Contact Details -->
                <div class="space-y-8">
                    @foreach ($contacts as $contact)
                        <div class="flex items-center space-x-5 group">

                            <div
                                class="w-16 h-16 rounded-full bg-[#B11E38] flex items-center justify-center overflow-hidden p-4">

                                @if ($contact->icon)
                                    <img src="{{ asset('storage/' . $contact->icon) }}"
                                        class="w-full h-full object-contain">
                                @endif

                            </div>

                            <span class="text-primaryText  text-[18px]  tracking-wider">
                                {{ $contact->value }}
                            </span>

                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Side: Query Form -->
            <div class="space-y-8" id='enquries_form'>
                <div>
                    <h2 class="text-3xl font-bold text-black tracking-tight uppercase">
                        Let us know your queries
                    </h2>
                    <div class="h-0.5 w-10 bg-gray-400 mt-4"></div>
                </div>

                <p class="text-stone-600 text-sm leading-relaxed">
                    Do you have any questions? Feel free to provide your contact details below, and one of our skilled team
                    members will promptly reach out to address your inquiries. Rest assured, your information is completely
                    secure with us.
                </p>

                <!-- Form Container -->
                {{-- <div class="bg-white p-8 rounded border border-primary max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 uppercase tracking-wide">Hey! There</h3>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <form action="{{ route('contact_enquiriesF.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="border-b border-gray-300">
                            <input type="text" name="name" placeholder="Enter Name *"
                                class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                value="{{ old('name') }}" required />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="border-b border-gray-300">
                                <input type="email" name="email" placeholder="Enter Email *"
                                    class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                    v   alue="{{ old('email') }}" required />
                            </div>
                            <div class="border-b border-gray-300">
                                <input type="tel" name="mobile" placeholder="Enter Mobile Number *"
                                    class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                    value="{{ old('mobile') }}" required />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="border-b border-gray-300">
                                <input type="text" name="company" placeholder="Enter Company"
                                    class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                    value="{{ old('company') }}" />
                            </div>
                            <div class="border-b border-gray-300">
                                <input type="text" name="city" placeholder="Enter City"
                                    class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                    value="{{ old('city') }}" />
                            </div>
                        </div>

                        <div class="border-b border-gray-300">
                            <textarea name="message" placeholder="Brief about your requirement" rows="3"
                                class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400 resize-none">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#B11E38] text-white py-3 rounded-lg font-bold text-sm tracking-widest transition-transform hover:scale-[1.02] active:scale-95 shadow-md">
                            SEND US
                        </button>
                    </form>
                </div> --}}
                @include('frontend.components.form')
            </div>
        </div>
    </section>

    <section class="bg-white pt-16 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 tracking-tight uppercase">
                    Let's Get In Touch
                </h2>
                <div class="w-16 h-0.5 bg-gray-400 mt-4 mb-6"></div>
                <p class=" text-sm font-medium leading-relaxed max-w-md">
                    Reach out to us today to elevate your brand with our expert cosmetic manufacturing services.
                </p>
            </div>
        </div>

        <div class="relative bg-[#B11E38] mt-16 pb-16 lg:pb-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                    <div class="py-16 text-white space-y-8">
                        <div class="flex items-center space-x-4 mb-10">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9b/Flag_of_Nepal.svg"
                                alt="Nepal Flag" class="w-10 h-12 object-contain" />
                            <span class="text-4xl font-bold border-b-2 border-white/30 pb-2 pr-20">Nepal</span>
                        </div>

                        <div class="space-y-6 max-w-[350px]">
                            <div class="flex items-center space-x-4">
                                <div class="bg-white p-2 rounded-full">
                                    <svg class="w-5 h-5 text-[#B11E38]" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium">+977-980-2372074</span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="bg-white p-2 rounded-full">
                                    <svg class="w-5 h-5 text-[#B11E38]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium">outreach@Himaida.com</span>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-white p-2 rounded-full mt-1 shrink-0">
                                    <svg class="w-5 h-5 text-[#B11E38]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium leading-relaxed">Budhanilkantha-01, Kathmandu, Bagmati
                                    Province, 44600, Nepal.</span>
                            </div>
                        </div>
                    </div>

                    <div class="relative lg:-mt-60 lg:mb-16 z-20">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3530.5315648968326!2d85.34927127524188!3d27.762590923053157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1f51bf4626ef%3A0xa60eb37b01c7e9e5!2sHimaida%20Nepal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1773036107886!5m2!1sen!2snp"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class='h-[600px] w-full max-h-[600px]'></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
