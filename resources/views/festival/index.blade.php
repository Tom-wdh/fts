<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Festivals') }}
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
                                <th style="width: 200px;">Name</th>
                                <th style="width: 200px;">Information:</th>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @foreach ($festivals as $festival)
                                <tr>
                                    <td>{{ $festival->name }}</td>

                                    <td><a href="/festival/{{ $festival->id }}">Click to see</a></td>
                                </tr>
                            @endforeach
                        </x-slot>
                    </x-table>
                    {{ $festivals->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>

