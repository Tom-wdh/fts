<x-layout>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Profile</h1>
        <div class="bg-white shadow-md rounded-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4">User Information <a href="{{ route('profile.edit') }}"
                    class="text-xs font-normal text-cyan-400">edit</a></h2>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Current amount of points:</strong> {{ Auth::user()->points }}</p>
        </div>
        @php
            $points = Auth::user()->points;
            $max = 100;
            $percent = min(100, ($points / $max) * 100);
        @endphp
        <label class="block mt-4 font-medium text-gray-700">Point Progress</label>
        <div class=" bg-gray-200 rounded-md h-4 mt-4 w-56">
            <div class="bg-indigo-500 h-4 rounded-md transition-all duration-300" style="width: {{ $percent }}%">
            </div>
        </div>
        <p class="text-sm mt-1">{{ $points }} / {{ $max }} points</p>
    </div>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-xl font-semibold mb-4">Your Trips</h2>
        <ul class="flex flex-wrap justify-start align-center">
            @if ($trips->isEmpty())
                <p class="text-gray-500">You don't have any booked trips yet.</p>
            @else
                @foreach ($trips as $trip)
                    <li class="bg-white shadow-md rounded-lg p-6 max-h-80 mr-3 mb-3 w-64">
                        <h1 class="font-bold mb-2">Festival: {{ $trip->festival->name ?? '-' }}</h1>
                        <h1 class="font-bold mb-2">{{ $trip->city }} - {{ $trip->time }} -
                            {{ $trip->festival->date }} </h1>
                        <p><strong>Seats booked:</strong> {{ $trip->pivot->quantity }}</p>
                        <p><strong>Price:</strong> €
                            {{ number_format(
                                $trip->pivot->used_points ? $trip->price * $trip->pivot->quantity * 0.5 : $trip->price * $trip->pivot->quantity, 2) }}
                        </p>
                    </li>
                @endforeach
            @endif
        </ul>
</x-layout>
