

<?php $__env->startSection('content'); ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🏢 Data Perusahaan</h2>

        <?php if(auth()->user()->role == 'admin'): ?>
            <a href="<?php echo e(route('perusahaan.create')); ?>" class="btn btn-success">
                + Tambah Perusahaan
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

            <form action="<?php echo e(route('perusahaan.index')); ?>" method="GET">

                <div class="row g-2">

                    <div class="col-md-9">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="🔍 Cari nama perusahaan, email atau telepon..."
                            value="<?php echo e(request('search')); ?>">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">
                            Cari
                        </button>
                    </div>

                    <div class="col-md-1 d-grid">
                        <a href="<?php echo e(route('perusahaan.index')); ?>" class="btn btn-secondary">
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

                    <?php $__empty_1 = true; $__currentLoopData = $perusahaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perusahaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td class="text-center">
                            <?php echo e(($perusahaans->currentPage()-1) * $perusahaans->perPage() + $loop->iteration); ?>

                        </td>

                        <td class="text-center">

                            <?php if($perusahaan->logo): ?>

                                <img src="<?php echo e(asset('storage/'.$perusahaan->logo)); ?>"
                                     width="70"
                                     height="70"
                                     class="rounded shadow-sm"
                                     style="object-fit:cover;">

                            <?php else: ?>

                                <span class="badge bg-secondary">
                                    Tidak Ada
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>
                            <strong><?php echo e($perusahaan->nama_perusahaan); ?></strong>
                        </td>

                        <td><?php echo e($perusahaan->email); ?></td>

                        <td><?php echo e($perusahaan->telepon); ?></td>

                        <td class="text-center">

                            <?php if(auth()->user()->role == 'admin'): ?>

                                <a href="<?php echo e(route('perusahaan.edit',$perusahaan->id)); ?>"
                                   class="btn btn-warning btn-sm">
                                    ✏ Edit
                                </a>

                                <form action="<?php echo e(route('perusahaan.destroy',$perusahaan->id)); ?>"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data perusahaan ini?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button class="btn btn-danger btn-sm">
                                        🗑 Hapus
                                    </button>

                                </form>

                            <?php else: ?>

                                <span class="badge bg-secondary fs-6">
                                    Lihat Saja
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

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

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($perusahaans->withQueryString()->links()); ?>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/perusahaan/index.blade.php ENDPATH**/ ?>