<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div style="background-image: url('{{ asset('images/wallet_transfer.png') }}');"
        class="bg-no-repeat bg-center bg-cover w-full md:h-[92vh] h-[99vh] no-scrollf">
        <div class="pt-28 pb-5" x-data="transitionHistory">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-12 mb-4">
                <div class="bg-gray-100">
                    <div class="bg-white p-6  md:mx-auto">
                        <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                            <path fill="currentColor"
                                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                            </path>
                        </svg>
                        <div>
                            <div class="text-center">
                                <h3 class="md:text-xl text-base text-gray-600 text-center">Payment Successful!
                                </h3>
                                <p class="text-gray-700 font-bold mb-3   font-serif text-3xl">
                                    {{ $transitionHistory->amount }}
                                    Ks
                                </p>
                            </div>
                            <hr>
                            <div class="mt-3 px-5">
                                <div class="flex  items-center justify-between mb-3">
                                    <p class="text-gray-500">Transaction Time</p>
                                    <p class="text-gray-700 italic">
                                        {{ \Carbon\Carbon::parse($transitionHistory->created_at)->setTimezone('Asia/Yangon')->format('Y-m-d H:i:s') }}
                                    </p>
                                </div>
                                @if (auth()->user()->id == $transitionHistory->fromUser?->id)
                                    <div class="flex  items-center justify-between mb-3">
                                        <p class="text-gray-500">Transition Phone</p>

                                        <p class="text-gray-700 italic">
                                            {{ $transitionHistory->toUser->phone }}
                                        </p>
                                    </div>
                                @endif
                                @if (auth()->user()->id == $transitionHistory->toUser?->id)
                                    <div class="flex  items-center justify-between mb-3">
                                        <p class="text-gray-500">Transition Phone</p>

                                        <p class="text-gray-700 italic">
                                            {{ $transitionHistory->fromUser->phone }}
                                        </p>
                                    </div>
                                @endif
                                @if (auth()->user()->id == $transitionHistory->fromUser?->id)
                                    <div class="flex  items-center justify-between mb-3">
                                        <p class="text-gray-500">Transition From</p>

                                        <p class="text-gray-700 italic">
                                            {{ $transitionHistory->toUser->name }}
                                        </p>
                                    </div>
                                @endif
                                @if (auth()->user()->id == $transitionHistory->toUser?->id)
                                    <div class="flex  items-center justify-between mb-3">
                                        <p class="text-gray-500">Transition To</p>

                                        <p class="text-gray-700 italic">
                                            {{ $transitionHistory->fromUser->name }}
                                        </p>
                                    </div>
                                @endif
                                <div class="flex  items-center justify-between mb-3">
                                    <p class="text-gray-500">Amount</p>
                                    <p class="text-gray-700 italic">
                                        {{ $transitionHistory->amount }} ks
                                    </p>
                                </div>
                                <div class="flex items-start justify-start mb-3 w-full">
                                    <div class="w-full items">
                                        <p class="text-gray-600 mb-1">Note</p>
                                        <hr>
                                        <p class="text-gray-600 italic text-capitalize px-2 mt-1">
                                            {{ $transitionHistory->note }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6 text-center">
                                <a href="{{ route('platform') }}"
                                    class="px-10 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2">
                                    GO BACK
                                </a>
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
                Alpine.data('transitionHistory', () => ({
                    init() {
                        socket.on('updateTransition', data => {
                            alert('data')
                            console.log('updatetransitions')
                        });
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
