<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return response()->json($kendaraan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_jenis' => 'required',
            'platnomor' => 'required',
        ]);


        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'kendaraan Created',
            'data' => $kendaraan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'kendaraan_jenis' => 'required',
            'platnomor' => 'required',
        ]);

        $item = Kendaraan::findOrFail($id);
        // Update data
        $item->update($validatedData);

        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Kendaraan::findOrFail($id);
        Kendaraan::destroy($item->id);
        return response()->json([
            'message' => 'Item deleted successfully',
            'data' => $item
        ], 200);
    }
}
