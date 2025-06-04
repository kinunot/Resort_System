<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cottage_id' => 'nullable|exists:cottages,id',
            'room_id' => 'nullable|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $data['user_id'] = $request->user()->id;

        $reservation = Reservation::create($data);

        return response()->json($reservation, 201);
    }

    public function myReservations(Request $request)
    {
        return Reservation::where('user_id', $request->user()->id)
            ->latest()
            ->take(1)
            ->get();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
