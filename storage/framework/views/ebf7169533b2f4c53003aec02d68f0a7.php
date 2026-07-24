<!DOCTYPE html>
<html>
<head>

<title>Edit Lowongan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Lowongan</h2>

<form action="<?php echo e(route('lowongan.update', $lowongan->id)); ?>" method="POST">

<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>

<div class="mb-3">
<label>Perusahaan</label>

<select name="perusahaan_id" class="form-control">

<?php $__currentLoopData = $perusahaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perusahaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($perusahaan->id); ?>"
<?php echo e($perusahaan->id == $lowongan->perusahaan_id ? 'selected' : ''); ?>>
<?php echo e($perusahaan->nama_perusahaan); ?>

</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>

</div>

<div class="mb-3">
<label>Posisi</label>
<input type="text" name="posisi"
class="form-control"
value="<?php echo e($lowongan->posisi); ?>">
</div>

<div class="mb-3">
<label>Lokasi</label>
<input type="text" name="lokasi"
class="form-control"
value="<?php echo e($lowongan->lokasi); ?>">
</div>

<div class="mb-3">
<label>Jenis Pekerjaan</label>
<input type="text" name="jenis_pekerjaan"
class="form-control"
value="<?php echo e($lowongan->jenis_pekerjaan); ?>">
</div>

<div class="mb-3">
<label>Gaji</label>
<input type="number" name="gaji"
class="form-control"
value="<?php echo e($lowongan->gaji); ?>">
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"><?php echo e($lowongan->deskripsi); ?></textarea>
</div>

<div class="mb-3">
<label>Persyaratan</label>
<textarea name="persyaratan" class="form-control"><?php echo e($lowongan->persyaratan); ?></textarea>
</div>

<div class="mb-3">
<label>Deadline</label>
<input type="date"
name="deadline"
class="form-control"
value="<?php echo e($lowongan->deadline); ?>">
</div>

<button class="btn btn-warning">
Update
</button>

<a href="<?php echo e(route('lowongan.index')); ?>" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/lowongan/edit.blade.php ENDPATH**/ ?>