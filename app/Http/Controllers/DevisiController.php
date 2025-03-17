<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $devisis = Devisi::all();

        // Periksa apakah request dari API atau View
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $devisis,
            ], 200);
        }

        return view('devisi.index', compact('devisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'divisi_nama' => 'required|string|max:255',
            'divisi_keterangan' => 'nullable|string|max:255',
        ]);

        $devisi = Devisi::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Devisi berhasil ditambahkan!',
                'data' => $devisi,
            ], 201);
        }

        return redirect()->route('devisi.index')->with('success', 'Devisi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Devisi $devisi, Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => $devisi,
            ], 200);
        }

        return view('devisi.show', compact('devisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Devisi $devisi)
    {
        return view('devisi.edit', compact('devisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Cari data Divisi berdasarkan ID
        $divisi = Devisi::findOrFail($id);

        // Validasi input (hanya required untuk memastikan key ada)
        $validated = $request->validate([
            'divisi_nama' => 'nullable',
            'divisi_keterangan' => 'nullable',
            'additional_info' => 'nullable|json',
        ]);

        // Debug data dari request
        Log::info('Request received', ['request' => $request->all()]);
        dd($request->all()); // Untuk debugging di Postman

        // Handle JSON decoding untuk field additional_info jika ada
        if (isset($validated['additional_info'])) {
            $validated['additional_info'] = json_encode(json_decode($validated['additional_info'], true));
        }

        // Tambahkan informasi pengguna yang memperbarui data
        $validated['updated_by'] = 1; // Sesuaikan dengan sistem otentikasi Anda

        // Debug sebelum update
        Log::debug('Data before update', ['divisi' => $divisi->toArray()]);
        Log::debug('Validated data', ['data' => $validated]);

        // Lakukan update data
        $divisi->update($validated);

        // Debug setelah update
        Log::debug('Data after update', ['divisi' => $divisi->fresh()->toArray()]);

        // Log hasil update
        Log::info('Divisi updated', ['request' => $validated, 'response' => $divisi]);

        // Respon JSON
        return response()->json([
            'status' => true,
            'message' => 'Data Updated',
            'data' => $divisi,
        ]);
    }


    public function destroy(Devisi $devisi, Request $request)
    {
        $devisi->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Devisi berhasil dihapus!',
            ], 200);
        }

        return redirect()->route('devisi.index')->with('success', 'Devisi berhasil dihapus!');
    }
}
