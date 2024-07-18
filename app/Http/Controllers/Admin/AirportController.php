<?php

namespace App\Http\Controllers\Admin;
use App\Models\Airport;
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirportController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Airport $model)
    {
        //

        return view('admin.airports.index')->with('airports' , $model->all());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = [
            "اليمن",
            "مصر",
            "الأردن",
            "Yemen",
            "Egypt",
            "Saudi Arabia",
            "Sudan",
            "Jordan",
            'Oman',


            // يمكنك إضافة المزيد من الدول هنا
        ];

        $cities = [
            "اليمن" => ["صنعاء", "عدن"],
            "مصر"=> ["القاهرة", "الإسكندرية"],
            "الأردن" => ["عمان", "الزرقاء", "إربد"],
            "Yemen"=> ["Sana'a", "Aden"],
            "Egypt"=> ["Cairo", "Alexandria", "Luxor"],
            "Saudi Arabia"=> ["Riyadh", "Jeddah", "Dammam"],
            "Sudan"=> ["Khartoum", "Al-Ubayyid", "Nyala"],
            "Jordan"=> ["Amman", "Zarqa", "Irbid"],
            'Oman' => ['Muscat', 'Salalah'],


            // يمكنك إضافة المزيد من المدن هنا
        ];

        return view('admin.airports.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Airport $airport)
    {
        //
        $request->validate([
            'name' => ['required' , 'string'] ,// التحقق من أن حقل الاسم مطلوب
            'city' => ['required' , 'string'] ,// التحقق من أن حقل المدينة مطلوب
            'country' => ['required' , 'string'] ,// التحقق من أن حقل الدولة مطلوب
            'code' => ['required' , 'string'] ,

        ]);

        Airport::create([
            'name' => $request->name ,
            'city' => $request->city ,
            'country' => $request->country ,
            'code' => $request->code ,
            //'user_id' => Auth::user()->id
           ]);
        return redirect()->route('admin.airport_1.index')->withSuccess(__('admin.Airport Add successfully.'));// إعادة التوجيه إلى صفحة الفهرس مع رسالة نجاح
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $airport = Airport::findOrFail($id);
        return view('admin.airports.show', compact('airport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)//(string $id)
    {
        //
        $airport = Airport::findOrFail($id);

        $countries = [
            "الأردن",
            "اليمن",
            "مصر",
            "الأردن",
            "Yemen",
            "Egypt",
            "Saudi Arabia",
            "Sudan",
            "Jordan",
            'Oman',

            // يمكنك إضافة المزيد من الدول هنا
        ];

        $cities = [
            "اليمن" => ["صنعاء", "عدن"],
            "مصر"=> ["القاهرة", "الإسكندرية"],
            "الأردن" => ["عمان", "الزرقاء", "إربد"],
            "Yemen"=> ["Sana'a", "Aden"],
            "Egypt"=> ["Cairo", "Alexandria", "Luxor"],
            "Saudi Arabia"=> ["Riyadh", "Jeddah", "Dammam"],
            "Sudan"=> ["Khartoum", "Al-Ubayyid", "Nyala"],
            "Jordan"=> ["Amman", "Zarqa", "Irbid"],
            'Oman' => ['Muscat', 'Salalah'],


            // يمكنك إضافة المزيد من المدن هنا
        ];
        return view('admin.airports.edit', compact('airport', 'countries', 'cities'));
        return respons()->json();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)//(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => ['required' , 'string'] ,
            'city' => ['required' , 'string'] ,
            'country' => ['required' , 'string'] ,
            'code' => ['required' , 'string'] ,

        ]);

        $airport=Airport::find($id);

        if(!$airport)
        { return redirect()->route('admin.airport_1.index')->withSuccess(__('admin.error','Airport not found.'));}
      //  $airport->update($request->all());
        $airport->name = $request->input('name');
        $airport->city = $request->input('city');
        $airport->country = $request->input('country');
        $airport->code = $request->input('code');

           //حفظ التعديلات
               $airport->save();

        return redirect()->route('admin.airport_1.index')->with('success', __('admin.Airport updated successfully.'));
    }
/*
 public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $airport = Airport::findOrFail($id);
        $airport->name = $request->input('name');
        $airport->country = $request->input('country');
        $airport->city = $request->input('city');
        $airport->save();

        return redirect()->route('airports.index')->with('success', 'تم تحديث المطار بنجاح');
    }

*/



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//(Airport $airport)
    {
        //
        $airport = Airport::findOrFail($id);
        $airport->delete();
        return redirect()->route('admin.airport_1.index')->with('success', __('admin.Airport delete successfully.'));
        //تم حذف المطار بنجاح//Airport deleted successfully.
    }
}
