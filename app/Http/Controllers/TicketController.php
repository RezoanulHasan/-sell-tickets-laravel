<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Trip;
use App\Models\SeatAllocation;
use App\Models\User;
class TicketController extends Controller
{
    public function showForm()
    {
        $locations = Location::all();
        return view('ticket.form', compact('locations'));
    }

    public function storeTrip(Request $request)
    {
        $request->validate([
            'trip_date' => 'required|date',
            'location_id' => 'required|exists:locations,id',
        ]);

        Trip::create([
            'trip_date' => $request->input('trip_date'),
            'location_id' => $request->input('location_id'),
        ]);

        return redirect()->route('trip.form')->with('success', 'Trip created successfully!');
    }

    public function showAvailableSeats(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $availableSeats = $this->getAvailableSeats($trip);

        return view('ticket.available_seats', compact('trip', 'availableSeats'));
    }

    public function purchaseTicket(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer',
        ]);

        $user = User::create(['name' => $request->input('user_name')]);

        SeatAllocation::create([
            'user_id' => $user->id,
            'trip_id' => $request->input('trip_id'),
            'seat_number' => $request->input('seat_number'),
        ]);

        return view('ticket.purchase_confirmation', compact('user'));
    }

    private function getAvailableSeats(Trip $trip)
    {
        $totalSeats = 36;
        $allocatedSeats = $trip->seatAllocations->pluck('seat_number')->toArray();
        $availableSeats = array_diff(range(1, $totalSeats), $allocatedSeats);

        return $availableSeats;
    }
}