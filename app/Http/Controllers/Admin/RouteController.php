<?php

namespace App\Http\Controllers\Admin;

use App\Models\Route;
use App\Models\Airport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Route $model)
    {
        //
       // $routes = Route::with(['departure_airport_id', 'arrival_airport_id'])->get(); // جلب جميع المسارات مع معلومات المطارات المرتبطة
        $routes = Route::all();
        $airport = Airport::all();
        return view('admin.routes.index', compact('routes','airport'));// عرض صفحة الفهرس وتمرير بيانات المسارات إليها
       // ->with('routes' , $model->all());

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $airports = Airport::all();// جلب جميع المطارات لعرضها في نموذج الإنشاء
        return view('admin.routes.create', compact('airports'));// عرض صفحة إنشاء مسار جديد وتمرير بيانات المطارات إليها
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Route $route)
    {
        //
        $request->validate([
           'departure_airport_id'=> ['required' , 'integer'] ,
           'arrival_airport_id' => ['required' , 'integer'] ,
           'distance' => ['required' , 'integer'] ,
           'duration' => ['required'] ,// , 'integer'


        ]);

        Route::create($request->all());
        return redirect()->route('admin.route_1.index')->with('success', 'Route created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $route = Route::findOrFail($id);
        $airports = Airport::all();
        return view('admin.routes.show', compact('route', 'airports'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $route = Route::findOrFail($id);
        $airports = Airport::all();
        return view('admin.routes.edit', compact('route', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'departure_airport_id' => ['required' , 'integer'] ,// التحقق من أن معرف مطار المغادرة مطلوب وصحيح
            'arrival_airport_id' => ['required' , 'integer'] ,// التحقق من أن معرف مطار الوصول مطلوب وصحيح
            'distance' => ['required','integer'] ,// التحقق من أن المسافة مطلوبة وصحيحة
            'duration' => ['required'] ,// التحقق من أن مدة الرحلة مطلوبة وصحيحة


        ]);


        $route = Route::find($id);

        if(!$route)
        { return redirect()->route('admin.route_1.index')->withSuccess(__('admin.error','route not found.'));}

       $route->update($request->all());

          //حفظ التعديلات
        $route->save();

        return redirect()->route('admin.route_1.index')->with('success', 'Route updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//(Route $route) //(string $id)
    {
        //
        $route = Route::findOrFail($id);
        $route->delete();
        return redirect()->route('admin.route_1.index')->with('success', 'Route deleted successfully.');
    }
}
