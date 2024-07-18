<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $ticket = Ticket::all();
        return response()->json($ticket, 200);
    }





    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'seat_number' => ['required', 'string'],
            'class' => ['required', 'string'],
            'price' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);
        $ticket = Ticket::create($validatedData);

        return response()->json([
            'message' => 'ticket created successfully!',
            'ticket' => $ticket,
        ], 201);
    }





    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return $ticket;
    }





    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'seat_number' => ['required', 'string'],
            'class' => ['required', 'string'],
            'price' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($validatedData);

        return response()->json([
            'message' => 'ticket updated successfully!',
            'reservation' => $ticket,
        ], 201);
    }





    public function destroy($id)
    {

        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return response()->json([
            'message' => 'ticket deleted successfully!',
        ]);
    }



}
