<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div style="background-image: url('{{ asset('images/wallet_transfer.png') }}');"
        class="bg-no-repeat bg-center bg-cover w-full h-[100vh] no-scrollf">
        <div class="pt-32" x-data="transitionHistory">
            @foreach ($transitionHistories as $history)
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-12 mb-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-4 flex w-full justify-between text-gray-900 dark:text-gray-100">
                            <div class="flex items-start justify-center">
                                <img src="{{ asset('images/dollor.png') }}" alt="dollor" class="h-20 w-20">
                                <div class="ml-5 mt-2">
                                    @if (auth()->user()->id == $history->fromUser?->id)
                                        <p class="text-xl font-semibold text-gray-800">
                                            <span> Trasfer To </span>
                                            <span
                                                class=" font-serif italic text-gray-600 text-lg">{{ $history->toUser->name }}</span>
                                        </p>
                                    @endif
                                    @if (auth()->user()->id == $history->toUser?->id)
                                        <p class="text-xl font-semibold text-gray-800">
                                            <span> Trasfer From </span>
                                            <span
                                                class=" font-serif italic text-gray-600 text-lg">{{ $history->fromUser->name }}</span>
                                        </p>
                                    @endif
                                    <p class="mt-2 text-gray-500 italic  font-semibold">
                                        {{ \Carbon\Carbon::parse($history->created_at)->setTimezone('Asia/Yangon')->format('Y-m-d H:i:s') }}
                                    </p>
                                </div>
                            </div>
                            <div class="md:mr-4 text-xl mt-3 ">
                                <div class="flex items-center justify-center">
                                    <div>
                                        <p class="font-semibold">Amount</p>
                                        <p class=" font-serif font-semibold text-gray-600">
                                            {{ number_format($history->amount) }} Kyats</p>
                                    </div>
                                    {{-- <div class="ml-14">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 font-bold text-white text-base py-1 px-4 rounded-full">
                                        Approve
                                    </button>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
