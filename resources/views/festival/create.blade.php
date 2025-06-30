<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Festival') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('festival.store') }}" class="mt-6 space-y-6">
                            @csrf <!-- CSRF Protection -->

                            <!-- Title Input -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Description Input -->
                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')" required autocomplete="city" />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <!-- Author Input -->
                            <div>
                                <x-input-label for="date" :value="__('Date')" />
                                <x-text-input id="date" name="date" type="text" class="mt-1 block w-full" :value="old('date')" required autocomplete="date" />
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>

                            
                            <!-- Submit Button -->
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('message'))
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 4000)"
                                        class="text-sm text-green-600"
                                    >{{ session('message') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
