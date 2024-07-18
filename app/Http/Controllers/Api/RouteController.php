<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Route;

class RouteController extends Controller
{
    public function index()
    {
        $route = Route::all();
        return response()->json($route, 200);
    }





    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'departure_airport_id' =>  ['required', 'exists:airports,id'],
            'arrival_airport_id' =>  ['required', 'exists:airports,id'],
            'distance' => ['required', 'integer'],
            'duration' => ['required', 'date_format:H:i:s'],
        ]);


        $route = Route::create($validatedData);

        return response()->json([
            'message' => 'route created successfully!',
            'reservation' => $route,
        ], 201);
    }





    public function show($id)
    {
        $route = Route::findOrFail($id);
        return $route;
    }





    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'departure_airport_id' =>  ['required', 'exists:airports,id'],
            'arrival_airport_id' =>  ['required', 'exists:airports,id'],
            'distance' => ['required', 'integer'],
            'duration' => ['required', 'date_format:H:i:s'],
        ]);

        $route = Route::findOrFail($id);
        $route->update($validatedData);

        return response()->json([
            'message' => 'route updated successfully!',
            'reservation' => $route,
        ], 201);
    }





    public function destroy($id)
    {

        $route = Route::findOrFail($id);
        $route->delete();

        return response()->json([
            'message' => 'route deleted successfully!',
        ]);
    }
}
