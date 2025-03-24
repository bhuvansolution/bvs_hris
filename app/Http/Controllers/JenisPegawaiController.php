<?php

namespace App\Http\Controllers;

use App\Models\JenisPegawai;
use Illuminate\Http\Request;

class JenisPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenispegawai = JenisPegawai::all();
        return response()->json($jenispegawai);
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
            'jenis_pegawai_keterangan' => 'required',
        ]);


        $jenispegawai = JenisPegawai::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Jenis pegawai Created',
            'data' => $jenispegawai
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPegawai $jenisPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPegawai $jenisPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'jenis_pegawai_keterangan' => 'required',
        ]);

        $item = JenisPegawai::findOrFail($id);
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
        $jenispegawai = JenisPegawai::findOrFail($id);
        JenisPegawai::destroy($jenispegawai->id);
        return response()->json([
            'message' => 'Item deleted successfully',
            'data' => $jenispegawai
        ], 200);
    }
}
