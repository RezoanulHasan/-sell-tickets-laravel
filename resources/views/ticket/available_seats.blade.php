<!-- resources/views/ticket/available_seats.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Available Seats for {{ $trip->location->name }} on {{ $trip->trip_date }}</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class=" mb-6">
            <div class="">
                @if(count($availableSeats) > 0)
                    <p class="text-lg">Available Seat Numbers: {{ implode(', ', $availableSeats) }}</p>
                @else
                    <p class="text-lg text-gray-600">No available seats for this trip.</p>
                @endif
            </div>
            <div class="mt-10">
                @if(count($bookedSeats) > 0)
                    <p class="text-lg">Booked Seat Numbers:</p>
                    <ul class="list-disc ml-6">
                        @foreach($bookedSeats as $seat)
                            <li class="mb-2">
                                @if(isset($seat['seat_number'], $seat['user']->name))
                                    Seat {{ $seat['seat_number'] }} is booked by {{ $seat['user']->name }}
                                @else
                                    Invalid seat data
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-lg text-gray-600">No seats are booked for this trip yet.</p>
                @endif
            </div>
        </div>

        <form action="{{ route('trip.purchase') }}" method="post" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            @csrf

            <input type="hidden" name="trip_id" value="{{ $trip->id }}">

            <div class="mb-4">
                <label for="seat_number" class="block text-gray-600 text-sm mb-2">Select Seat:</label>
                <select name="seat_number" id="seat_number" class="form-select w-full">
                    @foreach($availableSeats as $seat)
                        <option value="{{ $seat }}" class="text-sm">{{ $seat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="user_name" class="block text-gray-600 text-sm mb-2">Your Name:</label>
                <input type="text" name="user_name" id="user_name" class="form-input w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition duration-300">
                Purchase Ticket
            </button>
        </form>

        @if(count($availableSeats) === 0 && count($bookedSeats) === 0)
            <p class="text-red-500 mt-6 text-center">Sorry, no seats are available for this trip.</p>
        @endif
    </div>
@endsection
