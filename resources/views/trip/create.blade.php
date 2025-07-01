<!-- resources/views/book/create.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Trip') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-indigo-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('trip.store', ['festival' => $festival]) }}" class="mt-6 space-y-6">
                            @csrf <!-- CSRF Protection -->

                            <!-- Title Input -->
                            <div>
                                <x-input-label for="time" :value="__('Time')" />
                                <x-text-input id="time" name="time" type="text" class="mt-1 block w-full" :value="old('time')" required autofocus autocomplete="time" />
                                <x-input-error class="mt-2" :messages="$errors->get('time')" />
                            </div>

                            <!-- Description Input -->
                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')" required autocomplete="city" />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <!-- Author Input -->
                            <div>
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price')" required autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="points_to_give" :value="__('Points')" />
                                <x-text-input id="points_to_give" name="points_to_give" type="text" class="mt-1 block w-full" :value="old('points_to_give')" required autocomplete="points_to_give" />
                                <x-input-error class="mt-2" :messages="$errors->get('points_to_give')" />
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
                            <input type="hidden" name="festivalid" value="{{ $festival }}">

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-layout>
