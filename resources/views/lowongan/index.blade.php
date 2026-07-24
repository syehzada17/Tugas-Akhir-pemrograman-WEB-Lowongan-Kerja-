@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 Data Lowongan</h2>

        @if(auth()->user()->role == 'admin')
            <a href="{{ route('lowongan.create') }}" class="btn btn-success">
                + Tambah Lowongan
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Search -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <form action="{{ route('lowongan.index') }}" method="GET">

                <div class="row g-2">

                    <div class="col-md-9">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="🔍 Cari posisi, lokasi atau perusahaan..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">
                            Cari
                        </button>
                    </div>

                    <div class="col-md-1 d-grid">
                        <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>

                </div>

            </form>

        </div>
    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-dark text-center">

                        <tr>

                            <th width="60">No</th>
                            <th>Perusahaan</th>
                            <th>Posisi</th>
                            <th>Lokasi</th>
                            <th>Jenis</th>
                            <th>Gaji</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($lowongans as $lowongan)

                    <tr>

                        <td class="text-center">
                            {{ ($lowongans->currentPage()-1) * $lowongans->perPage() + $loop->iteration }}
                        </td>

                        <td>
                            <strong>{{ $lowongan->perusahaan->nama_perusahaan }}</strong>
                        </td>

                        <td>
                            <span class="badge bg-primary">
                                {{ $lowongan->posisi }}
                            </span>
                        </td>

                        <td>{{ $lowongan->lokasi }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ $lowongan->jenis_pekerjaan }}
                            </span>
                        </td>

                        <td>
                            Rp {{ number_format($lowongan->gaji,0,',','.') }}
                        </td>

                        <td class="text-center">

                            <a href="{{ route('lowongan.show',$lowongan->id) }}"
                               class="btn btn-info btn-sm text-white">
                                👁 Detail
                            </a>

                            @if(auth()->user()->role == 'admin')

                                <a href="{{ route('lowongan.edit',$lowongan->id) }}"
                                   class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('lowongan.destroy',$lowongan->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑 Hapus
                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="text-center py-5">

                            <h5 class="text-muted">
                                📂 Belum ada data lowongan
                            </h5>

                            <p class="text-muted mb-0">
                                Tidak ditemukan data lowongan.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->

            <div class="d-flex justify-content-center mt-4">

                {{ $lowongans->withQueryString()->links() }}

            </div>

        </div>

    </div>

</div>

@endsection