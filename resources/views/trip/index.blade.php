<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 1000px">
            <h1 class="text-lg font-semibold mb-4">Trips</h1>
                <div>
                    <x-table>
                        <x-slot name="thead">
                            <tr>
                                <th style="width: 200px;">Time</th>
                                <th style="width: 200px;">City</th>
                                <th style="width: 200px;">Price</th>
                                <th style="width: 200px;">Points</th>
                                <th></th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>{{ $trip->time }}</td>
                                    <td>{{ $trip->city }}</td>
                                    <td>{{ $trip->price }}</td>
                                    <td>{{ $trip->points_to_give }}</td>
                                    <td><a href="/trip/{{ $trip->id }}/show" class="bg-indigo-500 hover:bg-indigo-700 py-0 px-2 rounded mb-2">{{ __('Boek') }}</a></td>
                                   
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-table>
                    <br>
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('trip.create', ['festival' => $festival]) }}" class="bg-indigo-500 hover:bg-indigo-700 py-1 px-2 rounded">Create Trip</a>
                    {{ $trips->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>

