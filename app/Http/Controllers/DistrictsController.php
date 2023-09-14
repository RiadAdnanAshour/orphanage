<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

use App\Models\District;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $districts = District::all();
        return view('show.districts', ['districts' => $districts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all(); // استرجاع جميع المدن لعرضها في الاستمارة
        return view('create.createDistricts', ['cities' => $cities]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'district' => 'required|string|max:255', // تحقق من أن الحقل city مطلوب ويجب أن يكون نص ولا يزيد عن 255 حرفاً
            'city_id' => 'required|integer', // تحقق من أن الحقل governorate_id مطلوب ويجب أن يكون رقمًا صحيحًا
        ]);

        District::create([
            'Namedistrict'=>$request->input('district'),
            'city_id' => $request->input('city_id')
        ]);
        return redirect()->route('district.index')->with('success', 'تمت إضافة المدينة بنجاح.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cities = City::all(); // استرجاع جميع المدن لعرضها في الاستمارة

        $district = District::findOrFail($id);
        return view('edit.editDistricts',['cities' => $cities], compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'district' => 'required|string|max:255',
            'city_id' => 'required|integer',
        ]);

        $district = District::findOrFail($id);
        $district->update([
            'Namedistrict' => $request->input('district'),
            'city_id' => $request->input('city_id'),
        ]);

        return redirect()->route('district.index')->with('success', 'تم تحديث الحي بنجاح.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        District::destroy($id);
        return redirect()->route('district.index');


    }
}
