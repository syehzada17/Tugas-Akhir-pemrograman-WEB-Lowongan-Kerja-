<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Lowongan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahPerusahaan' => Perusahaan::count(),
            'jumlahLowongan' => Lowongan::count(),
        ]);
    }
}