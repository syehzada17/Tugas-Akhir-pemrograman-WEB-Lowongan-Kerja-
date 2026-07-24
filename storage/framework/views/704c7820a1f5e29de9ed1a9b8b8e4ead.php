<!DOCTYPE html>
<html>

<head>

    <title>Tambah Perusahaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Tambah Perusahaan</h2>

<form action="<?php echo e(route('perusahaan.store')); ?>"
      method="POST"
      enctype="multipart/form-data">

<?php echo csrf_field(); ?>

<div class="mb-3">
<label>Nama Perusahaan</label>
<input type="text" name="nama_perusahaan" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Logo Perusahaan</label>

    <input type="file"
           name="logo"
           class="form-control">

</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Telepon</label>
<input type="text" name="telepon" class="form-control">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Website</label>
<input type="text" name="website" class="form-control">
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<button class="btn btn-success">
Simpan
</button>

<a href="<?php echo e(route('perusahaan.index')); ?>" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/perusahaan/create.blade.php ENDPATH**/ ?>