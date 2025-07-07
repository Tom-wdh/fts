<x-layout>
            <img id="background" class="w-screen h-screen object-cover" src="/build/assets/img/bus.jpg" alt="Laravel background" />
            <h1 class="text-4xl text-white font-bold absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                Welcome to the Festival Travel System
            </h1>
            <p class="text-xl text-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mt-10">
                Discover and book trips to your favorite festivals with ease.
            </p>
            <br>
            <br>
            <p class="text-xl text-white absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mt-20">
                To use our system, please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> or <a href="{{ route('register') }}" class="text-blue-500 hover:underline">register</a>.
            </p>

</x-layout>
<style>
    body {
        overflow: hidden;
    }
</style>