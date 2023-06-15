@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-md">
            {{-- Registerd Quotes Listing --}}
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
@endsection