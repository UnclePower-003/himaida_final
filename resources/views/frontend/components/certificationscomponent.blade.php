            {{-- <div class="border-y border-primary py-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">

                    <div
                        class="flex flex-col items-center space-y-4 group transition-transform duration-300 hover:scale-105">
                        <img src="{{ asset('images/aboutus/FDA 1.png') }}" alt="FDA"
                            class="h-12 w-auto object-contain  group-hover:-0 transition-all">
                        <span class="text-stone-800 font-semibold text-lg uppercase tracking-tight">FDA Certified</span>
                    </div>

                    <div
                        class="flex flex-col items-center space-y-4 group transition-transform duration-300 hover:scale-105">
                        <img src="{{ asset('images/aboutus/ISO 1.png') }}" alt="ISO"
                            class="h-12 w-auto object-contain  group-hover:-0 transition-all">
                        <span class="text-stone-800 font-semibold text-lg uppercase tracking-tight">ISO 22000:2018
                            Certified</span>
                    </div>

                    <div
                        class="flex flex-col items-center space-y-4 group transition-transform duration-300 hover:scale-105">
                        <div
                            class="h-12 w-12 bg-gray-100 rounded-full flex items-center justify-center  group-hover:-0 transition-all">
                            <img src="{{ asset('images/aboutus/gmp certifiedd-01 1.png') }}" alt="DFTQC"
                                class="h-10 w-auto">
                        </div>
                        <span class="text-stone-800 font-semibold text-lg uppercase tracking-tight">DFTQC
                            Registered</span>
                    </div>

                    <div
                        class="flex flex-col items-center space-y-4 group transition-transform duration-300 hover:scale-105">
                        <img src="{{ asset('images/aboutus/GMP Quality Logo Vector 1.png') }}" alt="GMP"
                            class="h-12 w-auto object-contain  group-hover:-0 transition-all">
                        <span class="text-stone-800 font-semibold text-lg uppercase tracking-tight">GMP Certified</span>
                    </div>

                </div>
            </div> --}}


            <div class="border-y border-primary py-10">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">

                    @foreach ($certifications as $item)
                        <div
                            class="flex flex-col items-center space-y-4 group transition-transform duration-300 hover:scale-105">

                            <img src="{{ asset('storage/' . $item->image) }}" class="h-12 w-auto object-contain">

                            <span class="text-stone-800 font-semibold text-lg uppercase tracking-tight">
                                {{ $item->title }}
                            </span>

                        </div>
                    @endforeach

                </div>

            </div>
