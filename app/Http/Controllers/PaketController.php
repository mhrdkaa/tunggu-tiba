<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $daftarPaket = Paket::all();
        return view('paket.index', compact('daftarPaket'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_resi' => 'required|unique:paket|max:255',
            'nama_paket' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'status_paket' => 'required|in:cod,non cod'
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')
            ->with('sukses', 'Data paket berhasil ditambahkan!');
    }

    public function show(Paket $paket)
    {
        return view('paket.show', compact('paket'));
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'no_resi' => 'required|max:255|unique:paket,no_resi,' . $paket->id,
            'nama_paket' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'status_paket' => 'required|in:cod,non cod'
        ]);

        $paket->update($request->all());

        return redirect()->route('paket.index')
            ->with('sukses', 'Data paket berhasil diperbarui!');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('paket.index')
            ->with('sukses', 'Data paket berhasil dihapus!');
    }
}