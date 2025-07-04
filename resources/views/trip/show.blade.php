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
                    <p><strong>Price:</strong> €<span id="total-price">{{ number_format($trip->price, 2) }}</span>
                    <span class="text-gray-500" id="single-price" style="display:none;">{{ $trip->price }}</span>
                    </p>
                    <p><strong>Points to Give:</strong><span id="total-points">{{ $trip->points_to_give }}</span>
                        <span class="text-gray-500" id="single-points" style="display:none;">{{ $trip->points_to_give }}</span></p>
                    <br>
                    @php
    $userPoints = Auth::user()->points;
@endphp

<form id="bookForm" action="{{ route('trip.book', $trip->id) }}" method="POST">
    @csrf
    <input id="quantity" type="number" name="quantity" min="1" max="{{ $trip->seats }}" value="1" class="border rounded p-2 mb-4 w-full" placeholder="Enter quantity (max {{ $trip->seats }})">
    <input type="hidden" name="use_points" id="use_points" value="0">
    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
        {{ __('Book Trip') }}
    </button>
    @if($userPoints >= 100)
        <button type="button" id="discount" class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded ml-2">
            Use Points
        </button>
    @endif
</form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const quantityInput = document.getElementById('quantity');
        const totalPrice = document.getElementById('total-price');
        const totalPoints = document.getElementById('total-points');
        const singlePoints = parseInt(document.getElementById('single-points').textContent);
        const singlePrice = parseFloat(document.getElementById('single-price').textContent);
        const discountButton = document.getElementById('discount');
        const usePointsInput = document.getElementById('use_points');
        const bookForm = document.getElementById('bookForm');

        quantityInput.addEventListener('input', function() {
            let qty = parseInt(this.value) || 1;
            let total = (singlePrice * qty).toFixed(2);
            totalPrice.textContent = total;
            totalPoints.textContent = singlePoints * qty;
        });

        if (discountButton) {
            discountButton.addEventListener('click', function(event) {
                event.preventDefault();
                let qty = parseInt(quantityInput.value) || 1;
                let total = (singlePrice * qty * 0.5).toFixed(2);
                totalPrice.textContent = total;
                totalPoints.textContent = singlePoints * qty;
                usePointsInput.value = 1; // Mark that points should be used
            });
        }
    </script>
</x-layout>