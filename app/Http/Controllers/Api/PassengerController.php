<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        $passenger = Passenger::all();
        return response()->json($passenger, 200);
    }





    public function store(Request $request)
    {





        $passenger = Passenger::create($request->all());

        return response()->json([
            'message' => 'Passenger created successfully!',
            'reservation' => $passenger,
        ], 201);
    }





    public function show($id)
    {
        $passenger = Passenger::findOrFail($id);
        return $passenger;
    }





    public function update(Request $request, $id)
    {



        $passenger = Passenger::findOrFail($id);
        $passenger->update($request->all());

        return response()->json([
            'message' => 'Passenger updated successfully!',
            'reservation' => $passenger,
        ], 201);
    }





    public function destroy($id)
    {

        $passenger = Passenger::findOrFail($id);
        $passenger->delete();

        return response()->json([
            'message' => 'Passenger deleted successfully!',
        ]);
    }




}
