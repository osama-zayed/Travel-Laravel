<?php

namespace App\Http\Controllers\Admin;
use App\Models\Plane;
use App\Models\Route;
use App\Models\Flight;
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,Flight $model)
    {
        //
        $flights = Flight::with('plane')->get();
        $flights = Flight::with('route.departureAirport', 'route.arrivalAirport')->get();
        return view('admin.flights.index')->with('flights' , $model->all());
      // $inputDate=$request->input('date');
       // $date = Carbon::parse($inputDate);//
       // $dayOfWeek= $date->isoFormat('dddd');//
        //return view('admin.flights.index', ['dayOfWeek'=>$dayOfWeek])->with('flights' , $model->all());
    }

    //  or

/* public function index()
{
    $flights = Flight::with(['plane','route' ])->get();
    return view('admin.flights.index', compact('flights'));
}
*/


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $planes = Plane::all();
        $routes = Route::with('departureAirport', 'arrivalAirport')->get();
        return view('admin.flights.create', compact('planes','routes'));

    }

    /**
     *
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Flight $flight)
    {
        //
       $request->validate([
            'flight_number'=> ['required' , 'string'] ,
            'airline' => ['required' , 'string'] ,
            'plane_id' => ['required' , 'integer'] ,
            'route_id' => ['required' , 'integer'] ,
            'date' => ['required' ] ,
            'date' => ['required','date'] ,
            'departure_time' => ['required'] ,
            'arrival_time' => ['required'] ,
         //   'price' => ['required' ,'integer'] ,
            'status' => ['required','in:scheduled,delayed,cancelled'],
            'repeat_duration' => ['required','min:1'],//هنا عدد الاسابيع الي يجب تكرار الرحله فيها نحدد كم الرحلة التكرر
        ]);

        $flightData = $request->only([
            'flight_number',
            'airline',
            'plane_id',
            'route_id',
            'day',
            'date',
            'departure_time',
            'arrival_time',
           // 'price',
            'status'
        ]);

        $flightDate = Carbon::parse($request->date);
        $repeatDuration = $request->repeat_duration;

        for ($i = 0; $i < $repeatDuration; $i++) {
            $flightData['date'] = $flightDate->copy()->addWeeks($i);
            Flight::create($flightData);
        }
      // Flight::create($request->all());
        return redirect()->route('admin.flight_1.index')->withSuccess(__('admin.created'));// إعادة التوجيه إلى صفحة الفهرس مع رسالة نجاح
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $flight = Flight::findOrFail($id);
        $route = Route::all();
        $plane = Plane::all();
        return view('admin.flights.show', compact('flight','route','plane'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       // $routes = Route::with('departureAirport', 'arrivalAirport')->get();
        $flight = Flight::findOrFail($id);
        $planes = Plane::all();
        $routes = Route::with('departureAirport', 'arrivalAirport')->get();

        return view('admin.flights.edit', compact('flight','planes','routes' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'flight_number'=> ['required' , 'string'] ,
            'airline' => ['required' , 'string'] ,
            'plane_id' => ['required' , 'integer'] ,
            'route_id' => ['required' , 'integer'] ,
            'day' => ['required' ] ,
            'date' => ['required' ,'date'] ,
            'departure_time' => ['required' ] ,
            'arrival_time' => ['required'] ,
           // 'price' => ['required'] ,
            'status' => ['required','in:scheduled,delayed,cancelled'],
        ]);

        $flight = Flight::find($id);
        $flight->update($request->all());
        return redirect()->route('admin.flight_1.index')->with('success', 'Flight updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $flight = Flight::find($id);
        $flight->delete();
        return redirect()->route('admin.flight_1.index')->with('success', 'Flight deleted successfully.');
    }
}
