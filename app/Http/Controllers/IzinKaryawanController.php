<?php

namespace App\Http\Controllers;

use App\Models\IzinKaryawan;
use Illuminate\Http\Request;

class IzinKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $izinkaryawan = IzinKaryawan::all();
        return response()->json($izinkaryawan);
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
            'karyawan_id' => 'required',
            'jenisizin_id' => 'required',
            'izin_alasan' => 'required',
            'izin_waktu' => 'required',
            'izin_bukti' => 'required',
            'izin_keterangan' => 'required',
        ]);

        // Category::create($validated);

        // return redirect()->back()->with('success', 'Category created successfully.');
        $izin = IzinKaryawan::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'izin Created',
            'data' => $izin
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(IzinKaryawan $izinKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IzinKaryawan $izinKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IzinKaryawan $izinKaryawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IzinKaryawan $izinKaryawan)
    {
        //
    }
}
