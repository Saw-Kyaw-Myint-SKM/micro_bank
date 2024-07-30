<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Platform') }}
        </h2>
    </x-slot>

    <div x-data="platform">
        <div style="background-image: url('{{ asset('images/transfer.png') }}');"
            class="bg-no-repeat bg-center bg-cover w-full h-[90vh] no-scrollf">
            <div class="pt-6">
                <marquee>
                    <div class="flex items-center justify-center">
                        <div class="flex items-center justify-center font-bold text-lg mr-32">
                            <img src="{{ asset('images/USD.png') }}" alt="">
                            <span class="mx-1 text-blue-500"> 1 ‌</span> ‌ဒေါ်လာ = <span
                                class="text-blue-500 mx-1">{{ $usdToMmkRate }}</span> <span class="mr-1">ကျပ် </span>
                            <img src="{{ asset('images/my_MM.png') }}" alt="">
                        </div>
                        <div class="flex items-center justify-center font-bold text-lg mr-32">
                            <img src="{{ asset('images/USD.png') }}" alt="">
                            <span class="mx-1 text-blue-500"> 1 ‌</span> ‌ဒေါ်လာ = <span
                                class="text-blue-500 mx-1">{{ $usdToMmkRate }}</span> <span class="mr-1">ကျပ် </span>
                            <img src="{{ asset('images/my_MM.png') }}" alt="">
                        </div>
                        <div class="flex items-center justify-center font-bold text-lg mr-32">
                            <img src="{{ asset('images/USD.png') }}" alt="">
                            <span class="mx-1 text-blue-500"> 1 ‌</span> ‌ဒေါ်လာ = <span
                                class="text-blue-500 mx-1">{{ $usdToMmkRate }}</span> <span class="mr-1">ကျပ် </span>
                            <img src="{{ asset('images/my_MM.png') }}" alt="">
                        </div>
                        <div class="flex items-center justify-center font-bold text-lg mr-32">
                            <img src="{{ asset('images/USD.png') }}" alt="">
                            <span class="mx-1 text-blue-500"> 1 ‌</span> ‌ဒေါ်လာ = <span
                                class="text-blue-500 mx-1">{{ $usdToMmkRate }}</span> <span class="mr-1">ကျပ် </span>
                            <img src="{{ asset('images/my_MM.png') }}" alt="">
                        </div>
                        <div class="flex items-center justify-center font-bold text-lg mr-20">
                            <img src="{{ asset('images/USD.png') }}" alt="">
                            <span class="mx-1 text-blue-500"> 1 ‌</span> ‌ဒေါ်လာ = <span
                                class="text-blue-500 mx-1">{{ $usdToMmkRate }}</span> <span class="mr-1">ကျပ် </span>
                            <img src="{{ asset('images/my_MM.png') }}" alt="">
                        </div>
                    </div>
                </marquee>
            </div>
            <div class="md:pt-32 pt-20 px-2">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="mb-4">
                                <div class="flex items-center justify-between text-lg mb-3">
                                    <p class="font-semibold text-blue-500">Balance (Kyats)</p>
                                    <p>1 <span class="mx-1 text-blue-500">USD</span> = <span>{{ $usdToMmkRate }}</span>
                                        <span class="mx-1 text-blue-500">MMK</span>
                                    </p>
                                </div>
                                <p class="font-bold text-4xl text-gray-600 font-sans">
                                    {{ number_format($user->amount) }}
                                </p>
                            </div>
                            <hr>
                            <div class="flex justify-center items-center space-x-10 mt-6">
                                <div>
                                    <a href="{{ route('transfer.create') }}">
                                        <div
                                            class="border border-gray-300 w-40 h-40 flex shadow-md bg-gray-50 items-center justify-center hover:bg-gray-100 hover:border-2">
                                            <x-transfer-svg class="h-20 w-20" />
                                        </div>
                                        <p class="text-center mt-1 text-gray-600 font-serif">Transfer</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('transition.history') }}">
                                        <div
                                            class="border border-gray-300 w-40 h-40 flex shadow-md bg-gray-50 items-center justify-center hover:bg-gray-100 hover:border-2">
                                            <x-transfer-history-svg class="h-20 w-20" />
                                        </div>
                                        <p class="text-center mt-1 text-gray-600 font-serif">Transfer History</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('platform', () => ({

                }))
            })
        </script>
    @endpush
</x-app-layout>
