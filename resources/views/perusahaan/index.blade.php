@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🏢 Data Perusahaan</h2>

        @if(auth()->user()->role == 'admin')
            <a href="{{ route('perusahaan.create') }}" class="btn btn-success">
                + Tambah Perusahaan
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

            <form action="{{ route('perusahaan.index') }}" method="GET">

                <div class="row g-2">

                    <div class="col-md-9">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="🔍 Cari nama perusahaan, email atau telepon..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">
                            Cari
                        </button>
                    </div>

                    <div class="col-md-1 d-grid">
                        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">
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
                            <th width="90">Logo</th>
                            <th>Nama Perusahaan</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($perusahaans as $perusahaan)

                    <tr>

                        <td class="text-center">
                            {{ ($perusahaans->currentPage()-1) * $perusahaans->perPage() + $loop->iteration }}
                        </td>

                        <td class="text-center">

                            @if($perusahaan->logo)

                                <img src="{{ asset('storage/'.$perusahaan->logo) }}"
                                     width="70"
                                     height="70"
                                     class="rounded shadow-sm"
                                     style="object-fit:cover;">

                            @else

                                <span class="badge bg-secondary">
                                    Tidak Ada
                                </span>

                            @endif

                        </td>

                        <td>
                            <strong>{{ $perusahaan->nama_perusahaan }}</strong>
                        </td>

                        <td>{{ $perusahaan->email }}</td>

                        <td>{{ $perusahaan->telepon }}</td>

                        <td class="text-center">

                            @if(auth()->user()->role == 'admin')

                                <a href="{{ route('perusahaan.edit',$perusahaan->id) }}"
                                   class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('perusahaan.destroy',$perusahaan->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data perusahaan ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        🗑 Hapus
                                    </button>

                                </form>

                            @else

                                <span class="badge bg-secondary fs-6">
                                    Lihat Saja
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <h5 class="text-muted">
                                🏢 Belum ada data perusahaan
                            </h5>

                            <p class="text-muted">
                                Tidak ditemukan data perusahaan.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $perusahaans->withQueryString()->links() }}
            </div>

        </div>

    </div>

</div>

@endsection