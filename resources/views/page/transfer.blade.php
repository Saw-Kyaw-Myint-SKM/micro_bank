<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <section class="p-7">
                    <div>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Transfer Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Transfer to Phone Number') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    placeholder="Please enter phone number" :value="old('phone')" required autofocus
                                    autocomplete="phone" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div class="flex gap-4 w-full  justify-end items-center">
                                <x-primary-button>{{ __('next') }}</x-primary-button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Transfer Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Enter transfer amount') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')


                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name')" required autofocus autocomplete="name" disabled="true" />
                            </div>
                            <div>
                                <x-input-label for="amount" :value="__('Amount')" />
                                <x-text-input id="amount" amount="amount" type="text" class="mt-1 block w-full"
                                    :value="old('amount')" required autofocus autocomplete="amount"
                                    placeholder="Enter Amount" />
                                <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                            </div>
                            <div>
                                <x-input-label for="note" :value="__('Add Note')" />
                                <x-text-area id="note" name="note" type="text" class="mt-1 block w-full"
                                    placeholder="Please add note"></x-text-area>
                            </div>

                            <div class="flex gap-4 w-full  justify-end items-center">
                                <x-primary-button>{{ __('next') }}</x-primary-button>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>

    </div>
</x-app-layout>
