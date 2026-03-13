<!-- sidebar.blade.php -->
<div x-data="{ sidebarOpen: false }" class="relative">

    <!-- Mobile Toggle Button -->
    <button @click="sidebarOpen = true"
        class="md:hidden fixed top-7 left-4 z-40 p-1 px-3 bg-primary text-white rounded shadow-lg">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="bg-primary text-white w-[270px] h-full flex flex-col transition-transform duration-300 fixed z-40 md:relative md:translate-x-0">

        <!-- Logo -->
        <div class="h-[87px] flex items-center justify-center bg-primary shadow-xl p-2">
            <h2 class='text-2xl font-bold tracking-wider'>Dashboard</h2>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto styled-scrollbar" x-data="{ activeDropdown: null }">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" @click="sidebarOpen = false"
                class="flex items-center px-4 py-3 hover:bg-primaryL hover:text-black hover:rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primaryD text-white font-semibold rounded-lg' : '' }}">
                <i class="fas fa-tachometer-alt w-6"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            {{-- Users (Super Admin Only) --}}
            @if (auth()->user()->role === 'super_admin')
                <a href="{{ route('users.index') }}" @click="sidebarOpen = false"
                    class="flex items-center px-4 py-3 hover:bg-primaryL hover:text-white hover:rounded-lg
                    {{ request()->routeIs('users.*') ? 'bg-primaryD text-white font-semibold rounded-lg' : '' }}">
                    <i class="fa-solid fa-users w-6"></i>
                    <span class="font-medium">Users</span>
                </a>
            @endif

            <a href="{{ route('certificationcomponent.index') }}" @click="sidebarOpen = false"
                class="flex items-center px-4 py-3 hover:bg-primaryL hover:text-white hover:rounded-lg
                    {{ request()->routeIs('certificationcomponent.*') ? 'bg-primaryD text-white font-semibold rounded-lg' : '' }}">
                <i class="fa-solid fa-users w-6"></i>
                <span class="font-medium">Certificates</span>
            </a>






            @php
                $dropdowns = [
                    [
                        'title' => 'Home Page',
                        'icon' => 'fa-solid fa-house',
                        'routes' => [
                            'homehero.*',
                            'productdesc.*',
                            'homeproductrange.*',
                            'productcategories.*',
                            'services.*',
                            'process_steps.*',
                            'formulations.*',
                            'stats.*',
                            'faq.*',
                            'faq_banners.*',
                        ],
                        'links' => [
                            ['route' => 'homehero.index', 'icon' => 'fa-solid fa-star', 'text' => 'Hero Section'],
                            [
                                'route' => 'productdesc.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Desctiption Product',
                            ],
                            [
                                'route' => 'homeproductrange.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Product Range',
                            ],
                            [
                                'route' => 'productcategories.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Product Catagories',
                            ],
                            ['route' => 'services.index', 'icon' => 'fa-solid fa-star', 'text' => 'Our Services'],
                            [
                                'route' => 'process_steps.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Process Steps',
                            ],
                            [
                                'route' => 'formulations.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Formulation left right',
                            ],
                            ['route' => 'stats.index', 'icon' => 'fa-solid fa-star', 'text' => 'Stats'],
                            ['route' => 'faq.index', 'icon' => 'fa-solid fa-star', 'text' => 'FAQs'],
                            ['route' => 'faq_banners.index', 'icon' => 'fa-solid fa-star', 'text' => 'FAQBanner'],
                        ],
                    ],
                    [
                        'title' => 'About Us',
                        'icon' => 'fa-solid fa-house',
                        'routes' => ['whoweare.*', 'visionmission.*', 'corevalues.*', 'manufacturing.*'],
                        'links' => [
                            ['route' => 'whoweare.index', 'icon' => 'fa-solid fa-star', 'text' => 'Hero Section'],
                            [
                                'route' => 'visionmission.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'VisionMission',
                            ],
                            ['route' => 'corevalues.index', 'icon' => 'fa-solid fa-star', 'text' => 'Core Values'],
                            [
                                'route' => 'manufacturing.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Manufacturing',
                            ],
                            [
                                'route' => 'certificationcomponent.index',
                                'icon' => 'fa-solid fa-star',
                                'text' => 'Certificates',
                            ],
                        ],
                    ],
                ];
            @endphp

            {{-- Dropdown Loop --}}
            @foreach ($dropdowns as $dropdown)
                @php
                    $isActive = false;
                    foreach ($dropdown['routes'] as $pattern) {
                        if (request()->routeIs($pattern)) {
                            $isActive = true;
                            break;
                        }
                    }
                @endphp

                <div class="mb-2" x-init="{{ $isActive ? 'activeDropdown = \'' . $dropdown['title'] . '\'' : '' }}">

                    <button
                        @click="activeDropdown === '{{ $dropdown['title'] }}'
                    ? activeDropdown = null
                    : activeDropdown = '{{ $dropdown['title'] }}'"
                        class="flex items-center justify-between w-full px-4 py-3 hover:bg-primaryL hover:text-white hover:rounded-lg transition
                    {{ $isActive ? 'bg-primaryD text-white font-semibold rounded-lg' : '' }}">

                        <span class="flex items-center space-x-2">
                            <i class="{{ $dropdown['icon'] }} w-6"></i>
                            <span class="font-medium">{{ $dropdown['title'] }}</span>
                        </span>

                        <i :class="activeDropdown === '{{ $dropdown['title'] }}'
                            ?
                            'fa-solid fa-chevron-up' :
                            'fa-solid fa-chevron-down'"
                            class="transition-transform duration-300"></i>
                    </button>

                    <div x-show="activeDropdown === '{{ $dropdown['title'] }}'" x-transition
                        class="mt-1 space-y-1 pl-6">

                        @foreach ($dropdown['links'] as $link)
                            <a href="{{ route($link['route']) }}" @click="sidebarOpen = false"
                                class="flex items-center px-4 py-2 rounded-lg hover:bg-primaryL hover:text-black
                                {{ request()->routeIs(explode('.', $link['route'])[0] . '.*')
                                    ? 'bg-primaryD  text-white font-semibold'
                                    : 'text-white' }}">
                                <i class="{{ $link['icon'] }} w-6"></i>
                                <span class="font-medium">{{ $link['text'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach



        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center px-4 py-2 text-gray-300 hover:text-white transition-colors">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span class="font-medium ml-2">Logout</span>
                </button>
            </form>
        </div>
    </aside>
</div>
