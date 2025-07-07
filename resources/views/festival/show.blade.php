<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Festival Details') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 1000px">
            <div class="bg-indigo-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-indigo border-b border-gray-200">
                    <h1 class="text-3xl font-bold">{{ $festival->name }}</h1>
                    <p><strong>City:</strong> {{ $festival->city }}</p>
                    <p><strong>Date:</strong> {{ $festival->date }}</p>
                    <br>
                    <a class='bg-indigo-300 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mb-4'
                    href='/trip/{{ $festival->id }}'>Click here to view the trips</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>