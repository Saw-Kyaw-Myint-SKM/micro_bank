<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Platform') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <div class="flex items-center justify-between text-lg mb-3">
                            <p class="font-semibold text-blue-500">Balance (Ks)</p>
                            <p>1 USD = 3036 MMK</p>
                        </div>
                        <p class="font-bold text-4xl text-gray-600 font-sans">123000</p>
                    </div>
                    <hr>
                    <div class="flex justify-center items-center space-x-10 mt-6">
                        <div>
                            <div
                                class="border border-gray-300 w-40 h-40 flex shadow-md bg-gray-50 items-center justify-center hover:bg-gray-100 hover:border-2">
                                <x-transfer-svg class="h-20 w-20" />
                            </div>
                            <p class="text-center mt-1 text-gray-600 font-serif">Transfer</p>
                        </div>
                        <div>
                            <div
                                class="border border-gray-300 w-40 h-40 flex shadow-md bg-gray-50 items-center justify-center hover:bg-gray-100 hover:border-2">
                                <x-transfer-history-svg class="h-20 w-20" />
                            </div>
                            <p class="text-center mt-1 text-gray-600 font-serif">Transfer History</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
