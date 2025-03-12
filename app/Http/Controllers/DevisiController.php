<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use Illuminate\Http\Request;

class DevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devisis = Devisi::all();
        return view('devisi.index', compact('devisis'));
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
        $request->validate([
            'devisi_nama' => 'required|string|max:255',
            'devisi_keterangan' => 'nullable|string|max:255',
        ]);

        Devisi::create($request->all());
        return redirect()->route('devisi.index')->with('success', 'devisi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Devisi $devisi)
    {
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
    public function update(Request $request, Devisi $devisi)
    {

        $request->validate([
            'devisi_nama' => 'required|string|max:255',
            'devisi_keterangan' => 'nullable|string|max:255',
        ]);

        $devisi->update($request->all());
        return redirect()->route('devisi.index')->with('success', 'devisi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devisi $devisi)
    {
        $devisi->delete();
        return redirect()->route('devisi.index')->with('success', 'devisi berhasil dihapus!');
    }
}
