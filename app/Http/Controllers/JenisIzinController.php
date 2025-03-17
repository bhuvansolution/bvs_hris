<?php

namespace App\Http\Controllers;

use App\Models\JenisIzin;
use Illuminate\Http\Request;

class JenisIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisizin = JenisIzin::all();
        return response()->json($jenisizin);
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
            'jenisizin_nama' => 'required',
            'jenisizin_keterangan' => 'required',
        ]);


        $jenisizin = JenisIzin::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Jenis izin Created',
            'data' => $jenisizin
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisIzin $jenisIzin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisIzin $jenisIzin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'jenisizin_nama' => 'required',
            'jenisizin_keterangan' => 'required',
        ]);

        $item = JenisIzin::findOrFail($id);
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
        $jenisizin = JenisIzin::findOrFail($id);
        JenisIzin::destroy($jenisizin->id);
        return response()->json([
            'message' => 'Item deleted successfully',
            'data' => $jenisizin
        ], 200);
    }
}
