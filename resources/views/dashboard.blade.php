@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="p-5 mb-4 rounded-4 text-white shadow"
         style="background: linear-gradient(135deg,#0d6efd,#6610f2);">

        @if(auth()->user()->role == 'admin')

            <h1 class="fw-bold">👨‍💼 Dashboard Admin</h1>

            <p class="mb-0 fs-5">
                Selamat datang di <strong>Job Portal</strong>. Kelola data perusahaan dan lowongan kerja dengan mudah.
            </p>

        @else

            <h1 class="fw-bold">👨‍🎓 Dashboard Pelamar</h1>

            <p class="mb-0 fs-5">
                Selamat datang di <strong>Job Portal</strong>. Temukan perusahaan dan lowongan pekerjaan terbaik.
            </p>

        @endif

    </div>

    <!-- Statistik -->
    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-lg h-100">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted">Total Perusahaan</small>
                        <h1 class="fw-bold text-primary">{{ $jumlahPerusahaan }}</h1>
                    </div>

                    <div class="display-3">
                        🏢
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-lg h-100">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted">Total Lowongan</small>
                        <h1 class="fw-bold text-success">{{ $jumlahLowongan }}</h1>
                    </div>

                    <div class="display-3">
                        💼
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <!-- Informasi -->
        <div class="col-lg-8 mb-4">

            <div class="card border-0 shadow">

                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">📢 Informasi</h5>
                </div>

                <div class="card-body">

                    @if(auth()->user()->role == 'admin')

                        <h5>Selamat Datang Admin!</h5>

                        <p>
                            Anda memiliki akses penuh untuk mengelola sistem Job Portal.
                        </p>

                        <ul>
                            <li>✅ Menambah data perusahaan</li>
                            <li>✅ Mengubah data perusahaan</li>
                            <li>✅ Menghapus data perusahaan</li>
                            <li>✅ Menambah lowongan kerja</li>
                            <li>✅ Mengubah lowongan kerja</li>
                            <li>✅ Menghapus lowongan kerja</li>
                        </ul>

                    @else

                        <h5>Selamat Datang Pelamar!</h5>

                        <p>
                            Gunakan menu di atas untuk melihat informasi perusahaan dan lowongan kerja yang tersedia.
                        </p>

                        <ul>
                            <li>🔍 Melihat daftar perusahaan</li>
                            <li>📄 Melihat daftar lowongan</li>
                            <li>💼 Mencari pekerjaan yang sesuai</li>
                        </ul>

                    @endif

                </div>

            </div>

        </div>

        <!-- Menu Cepat -->
        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">⚡ Menu Cepat</h5>
                </div>

                <div class="card-body d-grid gap-3">

                    <a href="{{ route('perusahaan.index') }}"
                       class="btn btn-outline-primary btn-lg">
                        🏢 Data Perusahaan
                    </a>

                    <a href="{{ route('lowongan.index') }}"
                       class="btn btn-outline-success btn-lg">
                        💼 Data Lowongan
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection