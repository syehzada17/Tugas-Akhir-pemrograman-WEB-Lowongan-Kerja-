<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
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

        $perusahaans = Perusahaan::when($search, function ($query) use ($search) {
                $query->where('nama_perusahaan', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('telepon', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('perusahaan.index', compact('perusahaans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->cekAdmin();

        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->cekAdmin();

        $request->validate([
            'nama_perusahaan' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'website' => 'required',
            'deskripsi' => 'required',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
        }

        Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'logo' => $logoPath,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'website' => $request->website,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data perusahaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        return redirect()->route('perusahaan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        $this->cekAdmin();

        return view('perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $this->cekAdmin();

        $request->validate([
            'nama_perusahaan' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'website' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
            $perusahaan->logo = $logoPath;
        }

        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->website = $request->website;
        $perusahaan->deskripsi = $request->deskripsi;

        $perusahaan->save();

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data perusahaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $this->cekAdmin();

        $perusahaan->delete();

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data perusahaan berhasil dihapus.');
    }
}
