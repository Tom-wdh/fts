<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips') }}
        </h2>
        <x-auth-session-status :status="session('status')" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 1000px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <x-table>
                        <x-slot name="thead">
                            <tr>
                                <th style="width: 200px;">Time</th>
                                <th style="width: 200px;">City</th>
                                <th style="width: 200px;">Price</th>
                                <th style="width: 200px;">Points</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>{{ $trip->time }}</td>
                                    <td>{{ $trip->city }}</td>
                                    <td>{{ $trip->price }}</td>
                                    <td>{{ $trip->points_to_give }}</td>
                                    </td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-table>
                    {{ $trips->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

