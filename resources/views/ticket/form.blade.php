

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Create a New Trip</h2>
        
        <form action="{{ route('trip.store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="trip_date" class="block text-gray-600">Trip Date:</label>
                <input type="date" name="trip_date" id="trip_date" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="location_id" class="block text-gray-600">Location:</label>
                <select name="location_id" id="location_id" class="form-select mt-1 block w-full" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Trip</button>
        </form>
    </div>
@endsection
