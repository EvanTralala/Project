<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::with('kategori')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('pelanggan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggan',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')
                        ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit(Pelanggan $pelanggan)
    {
        $kategoris = Kategori::all();
        return view('pelanggan.edit', compact('pelanggan', 'kategori'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggan,email,' . $pelanggan->id,
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')
                        ->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
                        ->with('success', 'Pelanggan berhasil dihapus.');
    }
}