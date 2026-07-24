<!DOCTYPE html>
<html>
<head>
    <title>Edit Perusahaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Edit Perusahaan</h2>

    <form action="<?php echo e(route('perusahaan.update',$perusahaan->id)); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Nama Perusahaan</label>
            <input type="text"
                   name="nama_perusahaan"
                   class="form-control"
                   value="<?php echo e($perusahaan->nama_perusahaan); ?>">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="<?php echo e($perusahaan->email); ?>">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text"
                   name="telepon"
                   class="form-control"
                   value="<?php echo e($perusahaan->telepon); ?>">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat"
                      class="form-control"
                      rows="3"><?php echo e($perusahaan->alamat); ?></textarea>
        </div>

        <div class="mb-3">
            <label>Website</label>
            <input type="text"
                   name="website"
                   class="form-control"
                   value="<?php echo e($perusahaan->website); ?>">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
                      class="form-control"
                      rows="4"><?php echo e($perusahaan->deskripsi); ?></textarea>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="<?php echo e(route('perusahaan.index')); ?>" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/perusahaan/edit.blade.php ENDPATH**/ ?>