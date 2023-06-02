@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-md">
            <div class="mb-6">
                <p class="text-4xl mb-3">Register</p>
                <p class="text-sm">
                    Create an account to begin sharing your favorite quotes.
                </p>
            </div>
            <!-- Register Form -->
            <form action="{{ route('register') }}" method="post">
                @csrf
                <!-- Input Field 1: Name -->
                <div class="mb-3">
                    <label for="name" class="font-semibold">Name</label>
                    <input type="text" name="name" id="name" class="mt-2 border @error('name') border-red-500 @enderror w-full px-4 py-3 rounded-lg" value="{{ old('name') }}">
                    <!-- Error Message -->
                    @error('name')
                        <div class="text-red-800 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Input Field 2: Email -->
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
                <!-- Input Field 3: Password -->
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
                <!-- Input Field 4: Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="font-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" @error('password_confirmation') border-red-500 @enderror class="mt-2 border w-full px-4 py-3 rounded-lg" value="">
                    <!-- Error Message -->
                    @error('password_confirmation')
                        <div class="text-red-800 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Field 5: Submit Button -->
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-mdeium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection