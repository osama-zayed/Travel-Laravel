<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flight;
use App\Models\User;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,Reservation $model)
    {
        //
       // return view('admin.reservations.index')->with('reservations' , $model->all());
     $reservations = Reservation::with(['user', 'flight'])->get();
       return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'reservation_code' => 'required|unique:reservations',
            'user_id' => 'required',
            'flight_id' => 'required',
            'pass_num' => 'required',
            'seat_class' => 'required',
            'status' => 'required',
        ]);

        Reservation::create($request->all());
        return redirect()->route('admin.reservation_1.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       // $reservation = Reservation::find($id);
        $reservation = Reservation::with('passengers')->find($id);

        if (!$reservation) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
              // عرض معلومات المسافرين
              $passengers = $reservation->passengers;

        $users = User::all();
        $flights = Flight::all();
        return view('admin.reservations.show', compact('reservation','passengers','users','flights'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reservation = Reservation::find($id);
        $users = User::all();
        $flights = Flight::all();
        return view('admin.reservations.edit', compact('reservation', 'users', 'flights'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'reservation_code' => 'required|unique:reservations,reservation_code,' . $id,
            'user_id' => 'required',
            'flight_id' => 'required',
            'pass_num' => 'required',
            'seat_class' => 'required',
            'status' => 'required',
        ]);

        $reservation = Reservation::find($id);
        $reservation->update($request->all());
        return redirect()->route('admin.reservation_1.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->route('admin.reservation.index')->with('success', 'Reservation deleted successfully.');
    }
}
