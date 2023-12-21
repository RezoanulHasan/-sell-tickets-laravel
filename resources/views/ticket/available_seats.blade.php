<!-- resources/views/ticket/available_seats.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Available Seats for {{ $trip->location->name }} on {{ $trip->trip_date }}</h2>

        @if(count($availableSeats) > 0 || count($bookedSeats) > 0)
            @if(count($availableSeats) > 0)
                <p>Available Seat Numbers: {{ implode(', ', $availableSeats) }}</p>
            @else
                <p>No available seats for this trip.</p>
            @endif

            @if(count($bookedSeats) > 0)
                <p>Booked Seat Numbers: {{ implode(', ', $bookedSeats) }}</p>
            @else
                <p>No seats are booked for this trip yet.</p>
            @endif

            <form action="{{ route('trip.purchase') }}" method="post">
                @csrf

                <input type="hidden" name="trip_id" value="{{ $trip->id }}">

                <div class="mb-4">
                    <label for="seat_number" class="block text-gray-600">Select Seat:</label>
                    <select name="seat_number" id="seat_number" class="form-select mt-1 block w-full" required>
                        @foreach($availableSeats as $seat)
                            <option value="{{ $seat }}">{{ $seat }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Purchase Ticket</button>
            </form>
        @else
            <p class="text-red-500">Sorry, no seats are available for this trip.</p>
        @endif
    </div>
@endsection
