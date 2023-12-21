<!-- resources/views/ticket/form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-black text-white p-8 border rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-center">Create a New Trip</h2>
            
            <form action="{{ route('trip.store') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="trip_date" class="block text-gray-600">Trip Date:</label>
                    <input type="date" name="trip_date" id="trip_date" class="form-input mt-1 block w-full p-2  text-black border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="location_id" class="block text-gray-600">Location:</label>
                    <select name="location_id" id="location_id" class="form-select mt-1 block w-full p-2  bg-black border rounded" required>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
<div class="text-center">
                <button type="submit" class="bg-white text-black text-center px-4 py-2 rounded hover:bg-yellow-100 focus:outline-none focus:shadow-outline-blue">Create Trip</button></div>
            </form>
        </div>
    </div>
@endsection

