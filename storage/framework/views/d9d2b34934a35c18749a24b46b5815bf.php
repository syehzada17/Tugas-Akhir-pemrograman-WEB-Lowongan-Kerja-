

<?php $__env->startSection('content'); ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 Data Lowongan</h2>

        <?php if(auth()->user()->role == 'admin'): ?>
            <a href="<?php echo e(route('lowongan.create')); ?>" class="btn btn-success">
                + Tambah Lowongan
            </a>
        <?php endif; ?>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Search -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <form action="<?php echo e(route('lowongan.index')); ?>" method="GET">

                <div class="row g-2">

                    <div class="col-md-9">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="🔍 Cari posisi, lokasi atau perusahaan..."
                            value="<?php echo e(request('search')); ?>">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">
                            Cari
                        </button>
                    </div>

                    <div class="col-md-1 d-grid">
                        <a href="<?php echo e(route('lowongan.index')); ?>" class="btn btn-secondary">
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

                    <?php $__empty_1 = true; $__currentLoopData = $lowongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lowongan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td class="text-center">
                            <?php echo e(($lowongans->currentPage()-1) * $lowongans->perPage() + $loop->iteration); ?>

                        </td>

                        <td>
                            <strong><?php echo e($lowongan->perusahaan->nama_perusahaan); ?></strong>
                        </td>

                        <td>
                            <span class="badge bg-primary">
                                <?php echo e($lowongan->posisi); ?>

                            </span>
                        </td>

                        <td><?php echo e($lowongan->lokasi); ?></td>

                        <td>
                            <span class="badge bg-success">
                                <?php echo e($lowongan->jenis_pekerjaan); ?>

                            </span>
                        </td>

                        <td>
                            Rp <?php echo e(number_format($lowongan->gaji,0,',','.')); ?>

                        </td>

                        <td class="text-center">

                            <a href="<?php echo e(route('lowongan.show',$lowongan->id)); ?>"
                               class="btn btn-info btn-sm text-white">
                                👁 Detail
                            </a>

                            <?php if(auth()->user()->role == 'admin'): ?>

                                <a href="<?php echo e(route('lowongan.edit',$lowongan->id)); ?>"
                                   class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <form action="<?php echo e(route('lowongan.destroy',$lowongan->id)); ?>"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑 Hapus
                                    </button>

                                </form>

                            <?php endif; ?>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

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

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->

            <div class="d-flex justify-content-center mt-4">

                <?php echo e($lowongans->withQueryString()->links()); ?>


            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/lowongan/index.blade.php ENDPATH**/ ?>