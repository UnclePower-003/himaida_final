{{-- Top bar  --}}
<section
    class="w-full px-4 md:px-8 lg:px-12 py-4 bg-white shadow-sm border-b border-gray-100 flex justify-center max-sm:hidden">
    <!-- Using flex-wrap for tablets, and lg:flex-nowrap for desktop -->
    <div class="w-full max-w-full flex flex-nowrap items-center justify-between gap-4 lg:gap-6">

        <!-- Logo Section -->
        <div class="flex-shrink-0 order-1">
            <img src="{{ asset('images/Himaida.svg') }}" alt="himaida - from himalaya's regions and seasons"
                class="h-12 md:h-14 lg:h-16 w-auto object-contain" />
        </div>

        <!-- Info Section -->
        <!-- Hidden on mobile, full-width on tablet (drops below), normal on desktop -->
        <div class="order-2 w-full lg:w-auto flex-grow items-center justify-start lg:ml-4 hidden md:flex">
            <!-- Added a top border and padding on tablet to separate it nicely when stacked -->
            <div
                class="grid grid-cols-[auto_1fr] gap-x-4 lg:gap-x-6 gap-y-2 lg:gap-y-3 w-full border-t lg:border-t-0 pt-4 lg:pt-0 mt-2 lg:mt-0 border-gray-100">

                <!-- Top Row -->
                <div class="font-bold text-[13px] lg:text-[14px] text-black">
                    Ranked#1
                </div>
                <div class="text-[13px] lg:text-[14px] text-[#4a4a4a] flex flex-wrap items-center gap-x-2">
                    <span>Top Honey Manufactuer in Nepal</span>
                    <span class="text-gray-400 font-light hidden lg:inline">|</span>
                    <span>8 + years in industry</span>
                </div>

                <!-- Bottom Row -->
                <div class="font-bold text-[13px] lg:text-[14px] text-black leading-tight flex flex-col justify-start">
                    <span>Custom</span>
                    <span>Manufacture :</span>
                </div>
                <div class="text-[13px] lg:text-[14px] text-[#4a4a4a] leading-tight">
                    Honey, Shilajit, Herbs & Spices, Frozen Foods, <br class="hidden xl:block" />
                    Suppliment, Lip Balm, Tea & Coffee
                </div>

            </div>
        </div>

        <!-- Buttons Section -->
        <!-- Row on mobile/tablet, Column on desktop -->
        <div class="flex-shrink-0 flex flex-row md:flex-col gap-2 lg:gap-[10px]  order-3 ml-auto lg:ml-0">
            <button
                class="bg-[#B31B34] hover:bg-[#92162a] text-white text-[8px] md:text-[10px] font-medium py-2 px-2 md:px-6 md:py-2  rounded-full uppercase tracking-wider transition duration-200 whitespace-nowrap">
                Contact Us
            </button>
            <button
                class="bg-[#B31B34] hover:bg-[#92162a] text-white text-[8px] md:text-[10px] font-medium py-2 px-2 md:px-6 md:py-2  rounded-full uppercase tracking-wider transition duration-200 whitespace-nowrap">
                Chat Now
            </button>
        </div>

    </div>
</section>
<section>
    {{-- navigationlinks --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="flex max-md:justify-between justify-center max-w-full items-center px-4 lg:px-12 py-6">

            {{-- Logo (optional) --}}
            <div class="md:hidden">

                <img src="{{ asset('images/Himaida.svg') }}" alt="himaida - from himalaya's regions and seasons"
                    class="h-12 md:h-14 lg:h-16 w-auto object-contain" />

            </div>

            {{-- Desktop Menu --}}
            <ul
                class='hidden md:flex max-w-6xl justify-between items-center uppercase md:text-[9px] lg:text-[12px] font-semibold gap-4 lg:w-full tracking-wider '>
                <li>
                    <a href="{{ route('home') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('aboutus') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        About Us
                    </a>
                </li>

                {{-- Product Range with Dropdown --}}
                <li class="relative group">
                    <button
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out flex items-center gap-2 uppercase">
                        Product Range
                        <svg viewBox="0 0 384 512" class="w-4 h-4 transition-transform group-hover:rotate-180">
                            <path
                                d="M169.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 306.7 54.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div
                        class="absolute left-0 mt-0 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 ease-in-out py-2">
                        <a href="{{ route('shilajitmanufacturing') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            Shilajit Manufacturing
                        </a>
                        <a href="{{ route('supplimentmanufacturing') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            Suppliment Manufacturing
                        </a>
                        <a href="{{ route('herbalmanufacturing') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            Herbal Manufacturing
                        </a>
                        <a href="{{ route('spicesmanufacturing') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            Spices
                        </a>
                        <a href="{{ route('driedfood') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            Dried Food
                        </a>
                        <a href="{{ route('honeyproduts') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            honey produts
                        </a>
                        <a href="{{ route('tea') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            Tea
                        </a> 
                        <a href="{{ route('honeymanufacturing') }}"
                            class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                            honeymanu facturing
                        </a>
                    </div>
                </li>

                <li>
                    <a href="{{ route('privatelable') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        Private Label
                    </a>
                </li>
                <li>
                    <a href="{{ route('ourbrands') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        Our Brands
                    </a>
                </li>
                <li>
                    <a href="{{ route('manufacturing') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        Manufacturing
                    </a>
                </li>
                <li>
                    <a href="{{ route('careers') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        Careers
                    </a>
                </li>
                <li>
                    <a href="{{ route('contactus') }}"
                        class="text-gray-800 hover:text-stone-600 transition duration-300 ease-in-out">
                        Contact Us
                    </a>
                </li>
            </ul>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="md:hidden text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden bg-white  ">
            <ul class='flex flex-col uppercase text-sm font-semibold px-4'>
                <li>
                    <a href="{{ route('home') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        Home
                    </a>
                </li>
                <li>
                    <a href=""
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        About Us
                    </a>
                </li>

                {{-- Mobile Product Range Dropdown --}}
                <li>
                    <button id="mobile-product-btn"
                        class="w-full text-left px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition uppercase duration-200 flex justify-between items-center">
                        Product Range
                        {{-- <svg id="mobile-product-icon" class="w-4 h-4 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg> --}}
                        <svg id="mobile-product-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            class="w-4 h-4 transition-transform group-hover:rotate-180">
                            <path
                                d="M169.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 306.7 54.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                        </svg>
                    </button>

                    {{-- Mobile Dropdown Menu --}}
                    <div id="mobile-product-menu" class="hidden bg-gray-50">
                        <a href=""
                            class="block px-8 py-2 text-gray-700 hover:bg-blue-100 hover:text-stone-600 transition duration-200">
                            Category 1
                        </a>
                        <a href=""
                            class="block px-8 py-2 text-gray-700 hover:bg-blue-100 hover:text-stone-600 transition duration-200">
                            Category 2
                        </a>
                        <a href=""
                            class="block px-8 py-2 text-gray-700 hover:bg-blue-100 hover:text-stone-600 transition duration-200">
                            Category 3
                        </a>
                        <a href=""
                            class="block px-8 py-2 text-gray-700 hover:bg-blue-100 hover:text-stone-600 transition duration-200">
                            Category 4
                        </a>
                    </div>
                </li>

                <li>
                    <a href=""
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        Private Label
                    </a>
                </li>
                <li>
                    <a href=""
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        Our Brands
                    </a>
                </li>
                <li>
                    <a href=""
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        Manufacturing
                    </a>
                </li>
                <li>
                    <a href=""
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        Careers
                    </a>
                </li>
                <li>
                    <a href=""
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 hover:text-stone-600 transition duration-200">
                        Contact Us
                    </a>
                </li>
            </ul>
            <div class="w-full max-w-full flex flex-col  items-start p-8 space-y-6 ">

                <!-- Logo Section -->
                <div class=" border-t border-gray-200 w-full pt-8">
                    <img src="{{ asset('images/Himaida.svg') }}" alt="himaida - from himalaya's regions and seasons"
                        class="h-12 md:h-14 lg:h-16 w-auto object-contain" />
                </div>

                <!-- Info Section -->
                <!-- Hidden on mobile, full-width on tablet (drops below), normal on desktop -->
                <div class=" w-full  flex-wrap items-center justify-start">
                    <!-- Added a top border and padding on tablet to separate it nicely when stacked -->
                    <div class="grid grid-cols-[auto_1fr] gap-x-4 lg:gap-x-6 gap-y-2 lg:gap-y-3 w-full  pt-4">

                        <!-- Top Row -->
                        <div class="font-bold text-[13px] lg:text-[14px] text-black">
                            Ranked#1
                        </div>
                        <div class="text-[13px] lg:text-[14px] text-[#4a4a4a] flex flex-wrap items-center gap-x-2">
                            <span>Top Honey Manufactuer in Nepal</span>
                            <span class="text-gray-400 font-light hidden lg:inline">|</span>
                            <span>8 + years in industry</span>
                        </div>

                        <!-- Bottom Row -->
                        <div
                            class="font-bold text-[13px] lg:text-[14px] text-black leading-tight flex flex-col justify-start">
                            <span>Custom</span>
                            <span>Manufacture :</span>
                        </div>
                        <div class="text-[13px] lg:text-[14px] text-[#4a4a4a] leading-tight">
                            Honey, Shilajit, Herbs & Spices, Frozen Foods, <br class="hidden xl:block" />
                            Suppliment, Lip Balm, Tea & Coffee
                        </div>

                    </div>
                </div>

                <!-- Buttons Section -->
                <!-- Row on mobile/tablet, Column on desktop -->
                <div class=" flex gap-2  w-full">
                    <button
                        class="bg-[#B31B34] hover:bg-[#92162a] text-white text-[12px] font-medium py-2 px-5   rounded-full uppercase tracking-wider transition duration-200 whitespace-nowrap">
                        Contact Us
                    </button>
                    <button
                        class="bg-[#B31B34] hover:bg-[#92162a] text-white text-[12px]  font-medium py-2 px-5   rounded-full uppercase tracking-wider transition duration-200 whitespace-nowrap">
                        Chat Now
                    </button>
                </div>

            </div>
        </div>

    </nav>
</section>

@push('script')
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileProductBtn = document.getElementById('mobile-product-btn');
        const mobileProductMenu = document.getElementById('mobile-product-menu');
        const mobileProductIcon = document.getElementById('mobile-product-icon');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        mobileProductBtn.addEventListener('click', () => {
            mobileProductMenu.classList.toggle('hidden');
            mobileProductIcon.classList.toggle('rotate-180');
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileProductMenu.classList.add('hidden');
                mobileProductIcon.classList.remove('rotate-180');
            });
        });
    </script>
@endpush
