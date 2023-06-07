@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-md">
            <div class="mb-6">
                <p class="text-4xl mb-3">Login</p>
                <p class="text-sm">
                    Login to begin sharing your favorite quotes.
                </p>
            </div>
            <!-- Invalid Status Message -->
           @if (session('status'))
                <div class="bg-red-600 text-white mb-4 p-3 text-sm rounded-md">
                    {{ session('status') }}
                </div>
           @endif
            <!-- Register Form -->
            <form action="{{ route('login') }}" method="post">
                @csrf
                <!-- Input Field 1: Email -->
                <div class="mb-3">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="text" name="email" id="email" class="mt-2 border @error('email') border-red-500 @enderror w-full px-4 py-3 rounded-lg" value="{{ old('email') }}">
                    <!-- Error Message -->
                    @error('email')
                        <div class="text-red-800 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Input Field 2: Password -->
                <div class="mb-3">
                    <label for="password" class="font-semibold">Password</label>
                    <input type="password" name="password" id="password" class="mt-2 border @error('password') border-red-500 @enderror w-full px-4 py-3 rounded-lg" value="">
                    <!-- Error Message -->
                    @error('password')
                        <div class="text-red-800 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Field 3: Submit Button -->
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-mdeium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection