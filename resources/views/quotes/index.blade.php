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
            <form action="{{ route('quotes') }}" method="post" class="mb-8">
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

            {{-- Registerd Quotes Listing --}}
            <div>
                <!-- Check if there are quotes present in the database -->
                @if ($quotes->count())
                    <!-- Loop through and output each quote record -->
                    @foreach ($quotes as $quote)
                        <div class="mb-2 mt-4">
                            <a href="#" class="font-bold">{{ $quote->user->name }} <span class="text-sm text-gray-600">{{ $quote->created_at->diffForHumans() }}</span></a>
                            <p>{{ $quote->body }}</p>
                        </div>

                        <!-- Add the 'delete' link and button -->
                        @if ($quote->ownedBy(auth()->user()))
                            <div>
                                <form action="{{ route('quotes.destroy', $quote) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Delete</button>
                                </form>
                            </div>
                        @endif

                        <!-- Add the like and unlike links/buttons -->
                        <div class="flex text-center">
                            @auth
                                @if (!$quote->likedBy(auth()->user()))
                                    <form action="{{ route('quotes.likes', $quote) }}" method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500">Like</button>
                                    </form>
                                @else
                                    <form action="{{ route('quotes.likes', $quote) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">Unlike</button>
                                    </form>
                                @endif
                            @endauth

                            <!-- Add likes count -->
                            {{ $quote->likes->count() }} {{ Str::plural('like', $quote->likes->count()) }}
                        </div>
                    @endforeach

                    {{-- End pagination links --}}
                    {{ $quotes->links() }}
                @else
                    <p>There are no quotes</p>
                @endif
            </div>

        </div>
    </div>
@endsection