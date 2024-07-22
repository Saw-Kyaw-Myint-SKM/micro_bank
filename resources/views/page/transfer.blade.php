<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="transferPage">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <section class="p-7">
                    {{-- phone --}}
                    <div>
                        <template x-if="!confirmPhone">
                            <div>
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Transfer Information') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Transfer to Phone Number') }}
                                    </p>
                                </header>
                                <div>
                                    <div>
                                        <form method="post" @submit.prevent="findPhone" autocomplete="off"
                                            class="mt-6 space-y-6">
                                            @csrf

                                            <div>
                                                <x-input-label for="phone" :value="__('Phone')" />
                                                <x-text-input id="phone" name="phone" type="text"
                                                    class="mt-1 block w-full" placeholder="Please enter phone number"
                                                    required autofocus autocomplete="phone"
                                                    x-model="findPhoneForm.phone" />
                                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                            </div>

                                            <div class="flex gap-4 w-full  justify-end items-center">
                                                <x-primary-button>{{ __('next') }}</x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    {{-- user data --}}
                    <div>
                        <template x-if="confirmPhone">
                            <div>
                                <div>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Transfer Information') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Enter transfer amount') }}
                                    </p>
                                </div>

                                <form method="post" @submit.prevent="transition" class="mt-6 space-y-6">
                                    @csrf
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" name="name" type="text"
                                            class="mt-1 block w-full" required autofocus autocomplete="name"
                                            disabled="true" x-model="transitionForm.name" />
                                    </div>
                                    <div>
                                        <x-input-label for="amount" :value="__('Amount')" />
                                        <x-text-input id="amount" amount="amount" type="text"
                                            class="mt-1 block w-full" required autofocus autocomplete="amount"
                                            placeholder="Enter Amount" x-model="transitionForm.amount" />
                                        <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                                    </div>
                                    <div>
                                        <x-input-label for="note" :value="__('Note')" />
                                        <x-text-area id="note" name="note" type="text"
                                            class="mt-1 block w-full" placeholder="Please add note"
                                            x-model="transitionForm.note"></x-text-area>
                                    </div>

                                    <div class="flex gap-4 w-full  justify-end items-center">
                                        <x-primary-button>{{ __('next') }}</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </template>
                    </div>

                </section>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('transferPage', () => ({
                    phone: '',
                    confirmPhone: false,
                    formProcessing: false,
                    errors: null,
                    findPhoneRoute: "{{ route('find.phone') }}",
                    transitionRoute: "{{ route('transition.store') }}",

                    findPhoneForm: {
                        userId: '',
                        phone: ''
                    },
                    transitionForm: {
                        userId: 0,
                        name: '',
                        amount: '',
                        note: ''
                    },
                    findPhone() {
                        this.formProcessing = true;
                        axios
                            .post(this.findPhoneRoute, this.findPhoneForm)
                            .then(response => {
                                if (response.status == 200) {
                                    this.confirmPhone = true
                                    this.transitionForm.userId = response.data?.user?.id
                                    this.transitionForm.name = response?.data?.user?.name
                                }
                            })
                            .catch(error => {
                                if (error.response.status === 422) {
                                    this.errors = error.response.data.errors;
                                }
                                this.formProcessing = false;
                            });
                    },
                    transition() {
                        this.formProcessing = true;
                        axios
                            .post(this.transitionRoute, this.transitionForm)
                            .then(response => {
                                console.log('response', response);
                                if (response.status == 200) {
                                    this.confirmPhone = true;
                                    socket.emit('updateTransition', 'reloadTransition');
                                    window.location.href = "http://localhost:8000/transition-history";
                                }
                            })
                            .catch(error => {
                                if (error.response.status === 422) {
                                    this.errors = error.response.data.errors;
                                }
                                this.formProcessing = false;
                            });
                    },
                }))
            })
        </script>
    @endpush
</x-app-layout>
