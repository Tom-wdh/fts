<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width height=device-height">
    <script src="{{ URL::asset('/build/assets/js/script.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Festival Travel System</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
 /* Prevents scrolling */
        }
    </style>
</head>
<div class="min-h-screen bg-gray-900">
    <div class="mx-auto">
        <header class="py-4 bg-indigo-700 flex justify-between items-center">
            <nav class="hidden md:block">
                <a href="{{ route('festival.index') }}" class="text-white hover:text-gray-300 px-4 py-2">Home</a>
                </nav>
                <h1 class="md:text-3xl text-2xl font-bold text-center absolute left-1/2 -translate-x-1/2">Festival Travel System</h1>
            <div class="flex justify-end -translate-x-2">
                <button onclick="toggleMenu()" class="w-2/12 hover:bg-indigo-800 rounded-full accountbtn md:block hidden" type="button">
                    <img src="{{ URL::asset('/build/assets/img/account.png') }}" alt="Account">
                </button>
                <ul id="menuitem" class="hidden absolute bg-white shadow-lg rounded mt-10 h-[0px]">
                    @if (Auth::check())
                        <li class="mr-50">
                            <a href="{{ route('profile.index') }}"
                                class="text-indigo-800 hover:text-indigo-600 text-center bg-indigo-300 px-4 py-2 ml-4 block menutop">Profile</a>
                        </li>
                        <li>
                            <form method="POST" action="{{  route('logout') }}">
                                @csrf
                                <button type="submit" class="text-indigo-800 hover:text-indigo-600 text-center bg-indigo-300 px-4 py-2 ml-4 block menubottom">Log out</button>
                            </form>
                        </li>
                    @else
                    <li class="mr-50">
                        <a href="{{ route('register') }}"
                            class="text-indigo-800 hover:text-indigo-600 text-center bg-indigo-300 px-4 py-2 ml-4 block menutop">Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="text-indigo-800 hover:text-indigo-600 text-center bg-indigo-300 px-4 py-2 ml-4 block menubottom">Log in</a>
                    </li>
                    @endif
                </ul>
            </div>
    </div>
    </header>
    <main class="min-h-[90%] bg-indigo-300">
        {{ $slot }}
    </main>
    <footer class="bg-indigo-500 py-4 sticky bottom-0">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Festival Travel System. All rights reserved.
        </div>
    </footer>
</div>