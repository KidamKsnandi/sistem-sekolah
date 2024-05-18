<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = [
            "jurusans" => Jurusan::all()
        ];
        return view("jurusan.index", $data);
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|max:255',
            'kapasitas_jurusan' => 'required|integer',
        ]);

        $latestJurusan = Jurusan::orderBy('id', 'desc')->first();
        $kodeJurusan = $latestJurusan ? 'JRSN' . str_pad($latestJurusan->id + 1, 3, '0', STR_PAD_LEFT) : 'KIDAM001';

        $jurusan = new Jurusan;
        $jurusan->kode_jurusan = $kodeJurusan;
        $jurusan->nama_jurusan = $validated['nama_jurusan'];
        $jurusan->kapasitas_jurusan = $validated['kapasitas_jurusan'];
        $jurusan->save();

        return redirect()->route('daftarjurusan')->with('success', 'Data jurusan berhasil ditambah.');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $validated = $request->validate([
            'kode_jurusan' => 'required|max:255|unique:jurusans,kode_jurusan,' . $jurusan->id,
            'nama_jurusan' => 'required|max:255',
            'kapasitas_jurusan' => 'required|integer',
        ]);

        $jurusan->update($validated);
        return redirect()->route('daftarjurusan')->with('success', 'Data jurusan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect()->route('daftarjurusan')->with('success', 'Data jurusan berhasil dihapus.');
    }
}
