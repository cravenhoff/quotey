@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-md">
            <div class="mb-6">
                <p class="text-4xl mb-3">Quotes</p>
                <p class="text-sm">
                    Create and submit your quotes to share with your growing network today.
                </p>
            </div>
            <!-- Post/Add Quote Form -->
            <form action="{{ route('quotes') }}" method="post">
                @csrf
                <!-- Input Field 1: Quote Body -->
                <div class="mb-3">
                    <label for="body" class="sr-only font-semibold">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="border @error('body') border-red-500 @enderror w-full px-4 py-3 rounded-lg" placeholder="Post an inspiring quote!"></textarea>
                    <!-- Error Message -->
                    @error('body')
                        <div class="text-red-800 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Field 2: Submit Button -->
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-mdeium">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection