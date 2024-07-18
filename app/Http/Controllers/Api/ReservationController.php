<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;
use Dotenv\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Reservation::all();
        return response()->json($reservation, 200);
    }



    public function store(Request $request){


        $validatedData = $request->validate([
            'reservation_code' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'flight_id' => ['required', 'exists:flights,id'],
            'reservation_date' => ['required', 'date'],
            'pass_num' => ['required', 'integer'],
            'seat_class' => ['required','string'],
            'status' => ['required','string'],
        ]);


        $reservation = Reservation::create($validatedData);

        return response()->json([
            'message' => 'reservation created successfully!',
            'reservation' => $reservation,
        ], 201);
    }


    public function show($id){
        $reservation = Reservation::findOrFail($id);
        return $reservation;
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'reservation_code' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'flight_id' => ['required', 'exists:flights,id'],
            'reservation_date' => ['required', 'date'],
            'pass_num' => ['required', 'integer'],
            'seat_class' => ['required','string'],
            'status' => ['required','string'],
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($validatedData);

        return response()->json([
            'message' => 'reservation Update successfully!',
            'reservation' => $reservation,
        ], 201);
    }

    public function destroy($id){

        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json([
            'message' => 'Flight deleted successfully!',
        ]);
    }

}
