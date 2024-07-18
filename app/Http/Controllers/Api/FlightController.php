<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Flight;
use Fiber;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function index()
    {
        $flight = Flight::all();
        return response()->json($flight, 200);
    }





    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'flight_number' => ['required', 'string'],
            'airline' => ['required', 'string'],
            'plane_id' => ['required', 'exists:planes,id'],
            'route_id' => ['required', 'exists:routes,id'],
            'day' => ['required', 'string'],
            'date' => ['required', 'date'],
            'departure_time' => ['required', 'date_format:H:i:s'],
            'arrival_time' => ['required', 'date_format:H:i:s'],
            'status' => ['required','string','in:scheduled,delayed,cancelled'],
        ]);


        $flight = Flight::create($validatedData);

        return response()->json([
            'message' => 'flight created successfully!',
            'reservation' => $flight,
        ], 201);
    }





    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return $flight;
    }





    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'flight_number' => ['required', 'string'],
            'airline' => ['required', 'string'],
            'plane_id' => ['required', 'exists:planes,id'],
            'route_id' => ['required', 'exists:routes,id'],
            'day' => ['required', 'string'],
            'date' => ['required', 'date'],
            'departure_time' => ['required', 'date_format:H:i:s'],
            'arrival_time' => ['required', 'date_format:H:i:s'],
            'status' => ['required','string','in:scheduled,delayed,cancelled'],
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($validatedData);

        return response()->json([
            'message' => 'flight updated successfully!',
            'reservation' => $flight,
        ], 201);

    }





    public function destroy($id)
    {

        $airport = Flight::findOrFail($id);
        $airport->delete();

        return response()->json([
            'message' => 'flight deleted successfully!',
        ]);
    }






    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'flight_number'=> ['required' , 'string'] ,
    //         'airline' => ['required' , 'string'] ,
    //         'plane_id' => ['required' , 'integer'] ,
    //         'route_id' => ['required' , 'integer'] ,
    //         'date' => ['required' ] ,
    //         'date' => ['required','date'] ,
    //         'departure_time' => ['required'] ,
    //         'arrival_time' => ['required'] ,
    //      //   'price' => ['required' ,'integer'] ,
    //         'status' => ['required','in:scheduled,delayed,cancelled'],
    //         'repeat_duration' => ['required','min:1'],
    //     ]);

    //     $user = new Flight([
    //         'flight_number' => $request->flight_number,
    //         'airline' => $request->airline,
    //         'plane_id' => $request->plane_id,
    //         'route_id' => $request->route_id,
    //         'date' => $request->date,
    //         'date' => $request->date,
    //         'departure_time' => $request->departure_time,
    //         'arrival_time' => $request->arrival_time,
    //         'status' => $request->status,
    //         'repeat_duration' => $request->repeat_duration,
    //     ]);

    //     $user->save();

    //     return response()->json(['message' => 'Flight Created successfully'], 201);
    // }


}
