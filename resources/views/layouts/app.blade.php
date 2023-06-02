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
                <a href="" class="p-3">Home</a>
            </li>
            <li>
                <a href="" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="" class="p-3">Quotes</a>
            </li>
        </ul>
        <!-- Profile Links -->
        <ul class="flex items-center">
            <li>
                <a href="" class="p-3">Crystal Kewe</a>
            </li>
            <li>
                <a href="" class="p-3">Login</a>
            </li>
            <li>
                <a href="" class="p-3">Register</a>
            </li>
            <li>
                <a href="" class="p-3">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content: Use blade directive to add placeholder for content from other pages to be display using this app layouts file -->
    @yield('content')
</body>
</html>