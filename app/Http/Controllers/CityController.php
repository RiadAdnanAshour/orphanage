<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Governorate;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities= City::all();
        return view('show.city', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates = Governorate::all(); // استرجاع جميع المحافظات لعرضها في الاستمارة
        return view('create.createCity', ['governorates' => $governorates]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255', // تحقق من أن الحقل city مطلوب ويجب أن يكون نص ولا يزيد عن 255 حرفاً
            'governorate_id' => 'required|integer', // تحقق من أن الحقل governorate_id مطلوب ويجب أن يكون رقمًا صحيحًا
        ]);

        City::create([
            'Namecity' => $request->input('city'),
            'governorate_id' => $request->input('governorate_id'), // تعيين قيمة الحقل governorate_id بناءً على القيمة المحددة في الاختيار
        ]);

        return redirect()->route('city.index')->with('success', 'تمت إضافة المدينة بنجاح.');
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
        $governorates = Governorate::all();
        $city = City::findOrFail($id);

        return view('edit.editCity', compact('city', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'city' => 'required|string|max:255',
            'governorate_id' => 'required|integer',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'Namecity' => $request->input('city'),
            'governorate_id' => $request->input('governorate_id'),
        ]);

        return redirect()->route('city.index')->with('success', 'تم تحديث المدينة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        City::destroy($id);
        return redirect()->route('city.index');
    }
}
