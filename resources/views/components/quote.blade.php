@props(['quote' => $quote])

<div class="mb-2 mt-4">
    <a href="{{ route('users.quotes', $quote->user) }}" class="font-bold">{{ $quote->user->name }} <span class="text-sm text-gray-600">{{ $quote->created_at->diffForHumans() }}</span></a>
    <p>{{ $quote->body }}</p>
</div>

<!-- Add the 'delete' link and button -->
@can('delete', $quote)
    <form action="{{ route('quotes.destroy', $quote) }}" method="post" class="mr-1">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete</button>
    </form>
@endcan

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