<!-- resources/views/ticket/all_trips.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3 xl font-semibold mb-4n text-center mb-5 ">All Trips</h2>
     <h1 class="text-center font-bold  text-2xl   text-green-500 ">   <a   href="{{ route('trip.form') }}">Make Trips
        </a></h1>
    
    </div>


        @if(count($trips) > 0)
            <ul class="list-disc pl-4">
                @foreach($trips as $trip)
                    <li class="mb-4">
                        <div class="bg-white rounded-md p-4 shadow-md">
                            <p class="text-lg font-semibold mb-2">{{ $trip->location->name }}</p>
                            <p class="text-gray-600">on {{ $trip->trip_date }}</p>
                            <a href="{{ route('trip.seats', ['trip_id' => $trip->id]) }}" class="text-blue-500 hover:underline">View Seats</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-red-500">No trips available.</p>
        @endif
    </div>
@endsection
