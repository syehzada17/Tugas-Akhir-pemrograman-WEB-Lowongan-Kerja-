<!DOCTYPE html>
<html>
<head>

<title>Edit Lowongan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Lowongan</h2>

<form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Perusahaan</label>

<select name="perusahaan_id" class="form-control">

@foreach($perusahaans as $perusahaan)

<option value="{{ $perusahaan->id }}"
{{ $perusahaan->id == $lowongan->perusahaan_id ? 'selected' : '' }}>
{{ $perusahaan->nama_perusahaan }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label>Posisi</label>
<input type="text" name="posisi"
class="form-control"
value="{{ $lowongan->posisi }}">
</div>

<div class="mb-3">
<label>Lokasi</label>
<input type="text" name="lokasi"
class="form-control"
value="{{ $lowongan->lokasi }}">
</div>

<div class="mb-3">
<label>Jenis Pekerjaan</label>
<input type="text" name="jenis_pekerjaan"
class="form-control"
value="{{ $lowongan->jenis_pekerjaan }}">
</div>

<div class="mb-3">
<label>Gaji</label>
<input type="number" name="gaji"
class="form-control"
value="{{ $lowongan->gaji }}">
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control">{{ $lowongan->deskripsi }}</textarea>
</div>

<div class="mb-3">
<label>Persyaratan</label>
<textarea name="persyaratan" class="form-control">{{ $lowongan->persyaratan }}</textarea>
</div>

<div class="mb-3">
<label>Deadline</label>
<input type="date"
name="deadline"
class="form-control"
value="{{ $lowongan->deadline }}">
</div>

<button class="btn btn-warning">
Update
</button>

<a href="{{ route('lowongan.index') }}" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>