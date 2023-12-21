<!-- resources/views/ticket/all_trips.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">All Trips</h2>

        @if(count($trips) > 0)
            <ul>
                @foreach($trips as $trip)
                    <li>
                        <strong>{{ $trip->location->name }}</strong>
                        on {{ $trip->trip_date }}
                        <a href="{{ route('trip.seats', ['trip_id' => $trip->id]) }}">View Seats</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-red-500">No trips available.</p>
        @endif
    </div>
@endsection
