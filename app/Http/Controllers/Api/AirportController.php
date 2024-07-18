<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Airport;

class AirportController extends Controller
{

    
    public function index()
    {
        $airport = Airport::all();
        return response()->json($airport, 200);
    }





    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'code' => ['required', 'string'],
        ]);


        $airport = Airport::create($validatedData);

        return response()->json([
            'message' => 'Airport created successfully!',
            'reservation' => $airport,
        ], 201);
    }





    public function show($id)
    {
        $airport = Airport::findOrFail($id);
        return $airport;
    }





    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'code' => ['required', 'string'],
        ]);

        $airport = Airport::findOrFail($id);
        $airport->update($validatedData);

        return response()->json([
            'message' => 'Airport updated successfully!',
            'reservation' => $airport,
        ], 201);
    }





    public function destroy($id)
    {

        $airport = Airport::findOrFail($id);
        $airport->delete();

        return response()->json([
            'message' => 'Airport deleted successfully!',
        ]);
    }





}
