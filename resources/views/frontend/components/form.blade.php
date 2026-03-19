                <div class="relative lg:-mt-48 lg:mb-16 z-20" id='enquries_form'>
                    <div class="bg-white p-8 rounded-xl shadow-2xl border border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-8 uppercase tracking-wide">Hey! There</h3>

                        <!-- Success message -->
                        @if (session('success'))
                            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact_enquiriesF.store') }}" method="POST" class="space-y-12">
                            @csrf

                            <div class="border-b border-gray-300">
                                <input type="text" name="name" placeholder="Enter Name *"
                                    value="{{ old('name') }}"
                                    class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                    required />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="border-b border-gray-300">
                                    <input type="email" name="email" placeholder="Enter Email *"
                                        value="{{ old('email') }}"
                                        class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                        required />
                                </div>
                                <div class="border-b border-gray-300">
                                    <input type="tel" name="mobile" placeholder="Enter Mobile Number *"
                                        value="{{ old('mobile') }}"
                                        class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400"
                                        required />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="border-b border-gray-300">
                                    <input type="text" name="company" placeholder="Enter Company*"
                                        value="{{ old('company') }}"
                                        class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400" />
                                </div>
                                <div class="border-b border-gray-300">
                                    <input type="text" name="city" placeholder="Enter City *"
                                        value="{{ old('city') }}"
                                        class="w-full py-2 bg-transparent text-sm focus:outline-none placeholder:text-gray-400" />
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
                    </div>
                </div>