<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plane;
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Plane $model)
    {
        //
        return view('admin.planes.index')->with('planes' , $model->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.planes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Plane $plane)
    {
        //
        $request->validate([
            'name'=> ['required' , 'string'] ,
           'model' => ['required' , 'string'] ,
           'airline' => ['required' , 'string'] ,
           'first_class' => ['required' , 'integer'] ,
           'business_class' => ['required' , 'integer'] ,
           'economy_class' => ['required' , 'integer'] ,
           'type' => ['required' , 'string'] ,
           'status' => ['required' , 'string'] ,
        ]);

    /*    $totalSeats = $request->input('first_class_seats') + $request->input('business_class_seats') + $request->input('economy_class_seats');

        if ($totalSeats != $request->input('total_seats')) {
            return back()->withErrors(['total_seats' => 'إجمالي المقاعد يجب أن يتطابق مع مجموع مقاعد الدرجة الأولى ورجال الأعمال والدرجة العادية.']);
        }*/

     //   $plane->update($request->all());
       Plane::create([
            'name' => $request->name ,
            'model' => $request->model ,
            'airline' => $request->airline ,
            'total_seats' => $request->total_seats ,
            'first_class' => $request->first_class ,
            'business_class' => $request->business_class ,
            'economy_class' => $request->economy_class ,
            'type' => $request->type ,
            'status' => $request->status ,
       ]);

        return redirect()->route('admin.plane_1.index')->withSuccess(__('admin.created'));// إعادة التوجيه إلى صفحة الفهرس مع رسالة نجاح
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $plane = Plane::find($id);
        return view('admin.planes.show', compact('plane'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $plane = Plane::findOrFail($id);
        return view('admin.planes.edit', compact('plane'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=> ['required' , 'string'] ,
            'model' => ['required' , 'string'] ,
            'airline' => ['required' , 'string'] ,
            'first_class' => ['required' , 'integer'] ,
            'business_class' => ['required' , 'integer'] ,
            'economy_class' => ['required' , 'integer'] ,
            'status' => ['required' , 'string'] ,

        ]);
       /* $totalSeats = $request->input('first_class_seats') + $request->input('business_class_seats') + $request->input('economy_class_seats');

        if ($totalSeats != $request->input('total_seats')) {
            return back()->withErrors(['total_seats' => 'إجمالي المقاعد يجب أن يتطابق مع مجموع مقاعد الدرجة الأولى ورجال الأعمال والدرجة العادية.']);
        }*/

        $plane = Plane::find($id);

        if(!$plane)
        { return redirect()->route('admin.plane_1.index')->withSuccess(__('admin.error','Plane not found.'));}

        $plane->name = $request->input('name');
        $plane->model = $request->input('model');
        $plane->airline = $request->input('airline');
        $plane->total_seats = $request->input('total_seats');
        $plane->first_class = $request->input('first_class');
        $plane->business_class = $request->input('business_class');
        $plane->economy_class = $request->input('economy_class');
        $plane->type = $request->input('type');
        $plane->status = $request->input('status');

           //حفظ التعديلات
               $plane->save();

        return redirect()->route('admin.plane_1.index')->with('success', 'Plane updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $plane = Plane::findOrFail($id);
        $plane->delete();
        return redirect()->route('admin.plane_1.index')->with('success', 'تم حذف الطائره بنجاح.');
    }
}
