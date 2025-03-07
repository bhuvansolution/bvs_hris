<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pendidikans = Pendidikan::all();


        return view('pendidikan.index', compact('pendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'pendidikan_nama' => 'required|string|max:255',
            'pendidikan_keterangan' => 'nullable|string|max:255',
        ]);


        Pendidikan::create($validated);


        return redirect()->route('pendidikan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {

        return view('pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {

        $validated = $request->validate([
            'pendidikan_nama' => 'required|string|max:255',
            'pendidikan_keterangan' => 'nullable|string|max:255',
        ]);


        $pendidikan->update($validated);


        return redirect()->route('pendidikan.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {

        $pendidikan->delete();


        return redirect()->route('pendidikan.index')->with('success', 'Data berhasil dihapus!');
    }
}
