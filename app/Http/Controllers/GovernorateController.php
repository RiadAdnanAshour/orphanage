<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governorates = Governorate::all();

        return view('show.governorate',['governorates'=>$governorates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.createGovernorates');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Namegovernorate' => 'required|string|max:255',
        ]);

        Governorate::create([
            'Namegovernorate' => $request->Namegovernorate,
        ]);

        return redirect()->route('governorate.index')->with('success', 'تمت إضافة المحافظة بنجاح.');
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
        $governorate = Governorate::findOrFail($id);
        return view('edit.editGovernorate', compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Namegovernorate' => 'required|string|max:255',
        ]);

        $governorate = Governorate::findOrFail($id);
        $governorate->update([
            'Namegovernorate' => $request->Namegovernorate,
        ]);

        return redirect()->route('governorate.index')->with('success', 'تم تحديث المحافظة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Governorate::destroy($id);
        return redirect()->route('governorate.index');
    }
}
