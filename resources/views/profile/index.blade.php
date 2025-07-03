<x-layout>
    
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Profiel</h1>
        <div class="bg-white shadow-md rounded-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4">Gebruikers Informatie <a href="{{ route('profile.edit')}}" class="text-xs font-normal text-cyan-400">bewerken</a></h2>
            <p><strong>Naam:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Huidige Punten:</strong> {{ Auth::user()->points }}</p>
        </div>
        @php
    $points = Auth::user()->points;
    $max = 100;
    $percent = min(100, ($points / $max) * 100);
@endphp
<label class="block mt-4 font-medium text-gray-700">Punten Voortgang</label>
<div class=" bg-gray-200 rounded-md h-4 mt-4">
    <div class="bg-indigo-500 h-4 rounded-md transition-all duration-300"
         style="width: {{ $percent }}%">
    </div>
</div>
<p class="text-sm mt-1">{{ $points }} / {{ $max }} punten</p>
    </div>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-xl font-semibold mb-4">Jouw Trips</h2>
            <ul class="flex flex-wrap justify-start align-center">
                    {{-- @if($trips->isEmpty())
                        <p class="text-gray-500">Je hebt nog geen afspraken gemaakt.</p>
                    @else --}}
                    {{-- @foreach($trips as $trip)
                        <li class="bg-white shadow-md rounded-lg p-6 max-h-80 mr-3 mb-3">       
                            <h1>Trip Details:</h1>
                            {{-- <br> --}}
                            {{-- <p><strong>Seats: </p>
                            <p><strong>Time: </strong></p>
                        </li> --}}
                    {{-- @endforeach --}}
                 {{-- @endif --}}
            </ul>
</x-layout>