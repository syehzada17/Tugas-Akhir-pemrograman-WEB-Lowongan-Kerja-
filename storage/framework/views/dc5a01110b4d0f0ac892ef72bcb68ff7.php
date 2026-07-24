<!DOCTYPE html>
<html>
<head>

<title>Tambah Lowongan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Tambah Lowongan</h2>

<form action="<?php echo e(route('lowongan.store')); ?>" method="POST">

<?php echo csrf_field(); ?>

<div class="mb-3">
<label>Perusahaan</label>

<select name="perusahaan_id" class="form-control">

<?php $__currentLoopData = $perusahaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perusahaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($perusahaan->id); ?>">
<?php echo e($perusahaan->nama_perusahaan); ?>

</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>

</div>

<div class="mb-3">
<label>Posisi</label>
<input type="text" name="posisi" class="form-control">
</div>

<div class="mb-3">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control">
</div>

<div class="mb-3">
<label>Jenis Pekerjaan</label>
<input type="text" name="jenis_pekerjaan" class="form-control">
</div>

<div class="mb-3">
<label>Gaji</label>
<input type="number" name="gaji" class="form-control">
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Persyaratan</label>
    <textarea name="persyaratan" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Deadline</label>
    <input type="date" name="deadline" class="form-control">
</div>

<button class="btn btn-success">
Simpan
</button>

<a href="<?php echo e(route('lowongan.index')); ?>" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/lowongan/create.blade.php ENDPATH**/ ?>