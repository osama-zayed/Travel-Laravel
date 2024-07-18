<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Plane;
class PlaneController extends Controller
{
    public function index()
    {
        return Plane::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_class' => ['required', 'integer'],
            'business_class' => ['required', 'integer'],
            'economy_class' => ['required', 'integer'],
        ]);

        $plane = Plane::create($request->all());

        return response()->json([
            'message' => 'Flight created successfully!',
            'data' => $plane,
        ], 201);
    }

    public function show($id)
    {
        $plane = Plane::findOrFail($id);

        return $plane;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_class' => ['required', 'integer'],
            'business_class' => ['required', 'integer'],
            'economy_class' => ['required', 'integer'],
        ]);

        $plane = Plane::findOrFail($id);
        $plane->update($validatedData);

        return response()->json([
            'message' => 'Plane updated successfully!',
            'data' => $plane,
        ]);
    }

    public function destroy($id)
    {
        $plane = Plane::findOrFail($id);
        $plane->delete();

        return response()->json([
            'message' => 'Flight deleted successfully!',
        ]);
    }
}
