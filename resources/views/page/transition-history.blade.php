<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach (['saw', 'kyaw', 'myint'] as $user)
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-12 mb-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 flex w-full justify-between text-gray-900 dark:text-gray-100">
                        <div class="flex items-start justify-center">
                            <img src="{{ asset('images/dollor.png') }}" alt="dollor" class="h-20 w-20">
                            <div class="ml-5 mt-2">
                                <p class="text-xl font-semibold text-gray-800">Trasfer To <span
                                        class=" font-serif italic text-gray-600 text-lg">Saw Kyaw
                                        Myint</span></p>
                                <p class="mt-2 text-gray-500 italic  font-semibold">12:121:40</p>
                            </div>
                        </div>
                        <div class="md:mr-4 text-xl mt-3 ">
                            <div class="flex items-center justify-center">
                                <div>
                                    <p class="font-semibold">Amount</p>
                                    <p class=" font-serif font-semibold text-gray-600">10000</p>
                                </div>
                                <div class="ml-14">
                                    {{-- <p class="text-semibold italic font-serif text-xl px-3">Status</p> --}}
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 font-bold text-white text-base py-1 px-4 rounded-full">
                                        Approve
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
