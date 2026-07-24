<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Cek apakah user adalah admin
     */
    private function cekAdmin()
    {
        if (auth()->user()->role != 'admin') {
            abort(403, 'Akses ditolak');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $lowongans = Lowongan::with('perusahaan')
            ->when($search, function ($query) use ($search) {
                $query->where('posisi', 'like', "%{$search}%")
                      ->orWhere('lokasi', 'like', "%{$search}%")
                      ->orWhereHas('perusahaan', function ($q) use ($search) {
                          $q->where('nama_perusahaan', 'like', "%{$search}%");
                      });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('lowongan.index', compact('lowongans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->cekAdmin();

        $perusahaans = Perusahaan::all();

        return view('lowongan.create', compact('perusahaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->cekAdmin();

        $request->validate([
            'perusahaan_id' => 'required',
            'posisi' => 'required',
            'lokasi' => 'required',
            'jenis_pekerjaan' => 'required',
            'gaji' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
            'deadline' => 'required',
        ]);

        Lowongan::create([
            'perusahaan_id' => $request->perusahaan_id,
            'posisi' => $request->posisi,
            'lokasi' => $request->lokasi,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'gaji' => $request->gaji,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('lowongan.index')
            ->with('success', 'Data lowongan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {
        $lowongan->load('perusahaan');

        return view('lowongan.show', compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        $this->cekAdmin();

        $perusahaans = Perusahaan::all();

        return view('lowongan.edit', compact('lowongan', 'perusahaans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $this->cekAdmin();

        $request->validate([
            'perusahaan_id' => 'required',
            'posisi' => 'required',
            'lokasi' => 'required',
            'jenis_pekerjaan' => 'required',
            'gaji' => 'required',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
            'deadline' => 'required',
        ]);

        $lowongan->update([
            'perusahaan_id' => $request->perusahaan_id,
            'posisi' => $request->posisi,
            'lokasi' => $request->lokasi,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'gaji' => $request->gaji,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('lowongan.index')
            ->with('success', 'Data lowongan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        $this->cekAdmin();

        $lowongan->delete();

        return redirect()->route('lowongan.index')
            ->with('success', 'Data lowongan berhasil dihapus.');
    }
}