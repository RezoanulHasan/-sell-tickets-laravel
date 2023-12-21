
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Available Seats for {{ $trip->location->name }} on {{ $trip->trip_date }}</h2>

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
    </div>
@endsection
