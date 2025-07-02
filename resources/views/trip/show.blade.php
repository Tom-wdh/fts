<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trip Details') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 1000px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">{{ $trip->city }} - {{ $trip->time }}</h1>
                    <p><strong>Price:</strong> €{{ $trip->price }}</p>
                    <p><strong>Points to Give:</strong> {{ $trip->points_to_give }}</p>
                    <p><strong>Seats Available:</strong> {{ $trip->seats }}</p>
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-layout>