@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            {{-- Header --}}
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $quotes->count() }} {{ Str::plural('quote', $quotes->count()) }} and received {{ $user->receivedLikes->count() }} likes.</p>
            </div>

            {{-- Registerd Quotes Listing --}}
            <div class="bg-white p-6 rounded-md">
                <!-- Check if there are quotes present in the database -->
                @if ($quotes->count())
                <!-- Loop through and output each quote record -->
                @foreach ($quotes as $quote)
                    <x-quote :quote="$quote" />
                @endforeach

                {{-- End pagination links --}}
                {{ $quotes->links() }}
                @else
                    <p>{{ $user->name }} does not have any posts.</p>
                @endif
            </div>
        </div>
    </div>
@endsection