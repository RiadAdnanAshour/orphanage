<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Governorate;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;


class OrphanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // اجلب جميع الأيتام من قاعدة البيانات
        $orphans = Orphan::all();


        // قم بإرسال الأيتام إلى صفحة العرض (view) باستخدام دالة view()
        return view('show.orphan', ['orphans' => $orphans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates = Governorate::all();
        $cities = City::all();
        $districts = District::all();


        return view('create.createOrphans', [
            'governorates' => $governorates,
            'cities' => $cities,
            'districts' => $districts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // Make sure to include validation rules for other fields as well
            'id' => 'required|string|max:15|unique:orphans', // Validate uniqueness of the ID
            'personanName' => 'required|string|max:255',
            'dad' => 'required|string|max:255',
            'grandfather' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'mother' => 'required|string|max:255',
            'birthdate' => 'required|date', // Validate the birthdate field
            'telephone' => 'required|string|max:10',
            'mobile' => 'required|string|max:10',
            'district_id' => 'required|integer',
            'city_id' => 'required|integer',
            'governorate_id' => 'required|integer',

            // Add validation rules for other fields
        ]);

        Orphan::create([
            'id' => $request->input('id'),
            'personanName' => $request->input('personanName'),
            'dad' => $request->input('dad'),
            'grandfather' => $request->input('grandfather'),
            'family' => $request->input('family'),
            'mother' => $request->input('mother'),
            'governorate_id' => $request->input('governorate_id'),
            'city_id' => $request->input('city_id'),
            'district_id' => $request->input('district_id'),
            'birthdate' => $request->input('birthdate'), // Set the birthdate field
            'telephone' => $request->input('telephone'),
            'mobile' => $request->input('mobile'),
            // Set other fields based on the input values
        ]);

        return redirect()->route('orphan.index')->with('success', 'تمت إضافة اليتيم بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orphan $orphan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orphan $orphan)
    {
        $governorates = Governorate::all();
        $cities = City::all();
        $districts = District::all();

        return view('edit.editOrphans', [
            'orphan' => $orphan,
            'governorates' => $governorates,
            'cities' => $cities,
            'districts' => $districts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orphan $orphan)
    {
        $request->validate([
            // Add validation rules for the fields you want to update
            'personanName' => 'required|string|max:255',
            'dad' => 'required|string|max:255',
            'grandfather' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'mother' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'telephone' => 'required|string|max:10',
            'mobile' => 'required|string|max:10',
            'district_id' => 'required|integer',
            'city_id' => 'required|integer',
            'governorate_id' => 'required|integer',
        ]);

        $orphan->update([
            'personanName' => $request->input('personanName'),
            'dad' => $request->input('dad'),
            'grandfather' => $request->input('grandfather'),
            'family' => $request->input('family'),
            'mother' => $request->input('mother'),
            'governorate_id' => $request->input('governorate_id'),
            'city_id' => $request->input('city_id'),
            'district_id' => $request->input('district_id'),
            'birthdate' => $request->input('birthdate'),
            'telephone' => $request->input('telephone'),
            'mobile' => $request->input('mobile'),
            // Update other fields based on the input values
        ]);

        return redirect()->route('orphan.index')->with('success', 'تم تحديث بيانات اليتيم بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orphan $orphan)
    {
        $orphan->delete();
        return redirect()->route('orphan.index');
    }
}
