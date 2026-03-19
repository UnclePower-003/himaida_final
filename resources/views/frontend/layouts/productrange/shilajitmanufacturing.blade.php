@extends('frontend.app')

@section('content')
    {{-- hero section --}}
    @if ($hero)
        <section class="relative z-20">
            <div class="relative w-full h-full">

                {{-- Desktop Banner --}}
                <img src="{{ $hero->desktop_banner_url }}" alt="Private Labelling Banner"
                    class="hidden lg:block w-full object-cover object-center">

                {{-- Tablet Banner --}}
                <img src="{{ $hero->tablet_banner_url }}" alt="Private Labelling Banner"
                    class="hidden md:block lg:hidden w-full h-auto object-cover object-center bg-red-500">

                {{-- Mobile Banner --}}
                <img src="{{ $hero->mobile_banner_url }}" alt="Private Labelling Banner"
                    class="block md:hidden w-full object-contain bg-red-500">

                {{-- Content Overlay --}}
                <div class="absolute inset-0 flex items-center
                        px-4 sm:px-6 md:px-10 lg:px-16">

                    <div
                        class="uppercase tracking-tight
                            w-full lg:w-[500px]
                            flex justify-center lg:justify-start
                            text-center lg:text-start">

                        <h1
                            class="font-medium leading-tight
                               text-3xl md:text-5xl lg:text-5xl">
                            {{ $hero->title }}
                            <span class="text-primaryText">{{ $hero->highlighted_text }}</span>
                        </h1>

                    </div>
                </div>

            </div>
        </section>
    @endif

    <!-- Our Products Section -->
    <section class="max-w-7xl mx-auto px-4 py-16 md:py-24 border-b border-gray-100">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="text-4xl md:text-4xl font-bold text-[#B11E38] tracking-tight uppercase">
                Our Products
            </h2>
            <div class="h-0.5 w-16 bg-gray-300 mx-auto mt-4"></div>
        </div>

        <!-- Product List -->
        <div class="container mx-auto flex flex-col justify-center items-center gap-5 py-5">

            @foreach ($products as $product)
                @php $isLeft = $product->image_position === 'left'; @endphp

                <div class="flex flex-col lg:flex-row gap-10 items-center w-full">

                    {{-- Image --}}
                    <div @class([
                        'w-full lg:w-[40%] max-w-[424px] min-w-[224px] mx-auto lg:mx-0 flex justify-center',
                        'order-1' => $isLeft,
                        'order-1 lg:order-2' => !$isLeft,
                    ])>
                        <img src="{{ $product->image_url }}" alt="{{ $product->image_alt ?? $product->name }}"
                            class="w-full h-full object-contain">
                    </div>

                    {{-- Content --}}
                    <div @class([
                        'w-full lg:w-[60%] space-y-6',
                        'order-2' => $isLeft,
                        'order-2 lg:order-1' => !$isLeft,
                    ])>
                        <h3
                            class="text-xl md:text-4xl font-bold text-black uppercase leading-tight tracking-tight text-center lg:text-left">
                            {{ $product->name }}
                            @if ($product->subtitle)
                                <br>{{ $product->subtitle }}
                            @endif
                        </h3>

                        <div class="text-stone-800 text-[18px] leading-relaxed text-justify max-w-[650px]">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </section>

    @include('frontend.components.pagefaq')
    @include('frontend.components.getintouch')
@endsection
