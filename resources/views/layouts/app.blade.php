<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotey - Share a quote, inspire and rank</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <!-- Main navigation -->
    <nav class="p-6 bg-white flex justify-between mb-6">
        <!-- Main Nav Links -->
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('quotes') }}" class="p-3">Quotes</a>
            </li>
        </ul>
        <!-- Profile Links -->
        <ul class="flex items-center">
            {{-- Display links if user is authenticated, i.e. successfully signed in --}}
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                       @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth

            {{-- Display links if guest --}}
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>

    <!-- Main Content: Use blade directive to add placeholder for content from other pages to be display using this app layouts file -->
    @yield('content')
</body>
</html>