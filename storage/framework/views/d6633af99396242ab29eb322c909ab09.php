

<?php $__env->startSection('content'); ?>

<div class="container mt-5">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">💼 Detail Lowongan Kerja</h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">🏢 Nama Perusahaan</label>
                    <p><?php echo e($lowongan->perusahaan->nama_perusahaan); ?></p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">💼 Posisi</label>
                    <p><?php echo e($lowongan->posisi); ?></p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">📍 Lokasi</label>
                    <p><?php echo e($lowongan->lokasi); ?></p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">📄 Jenis Pekerjaan</label>
                    <p>
                        <span class="badge bg-success fs-6">
                            <?php echo e($lowongan->jenis_pekerjaan); ?>

                        </span>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">💰 Gaji</label>
                    <p>
                        Rp <?php echo e(number_format($lowongan->gaji,0,',','.')); ?>

                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">📅 Deadline</label>
                    <p><?php echo e(\Carbon\Carbon::parse($lowongan->deadline)->format('d F Y')); ?></p>
                </div>

                <div class="col-md-12 mb-3">

                    <label class="fw-bold">📝 Deskripsi</label>

                    <div class="border rounded p-3 bg-light">
                        <?php echo e($lowongan->deskripsi); ?>

                    </div>

                </div>

                <div class="col-md-12 mb-3">

                    <label class="fw-bold">✅ Persyaratan</label>

                    <div class="border rounded p-3 bg-light">
                        <?php echo e($lowongan->persyaratan); ?>

                    </div>

                </div>

                <div class="col-md-12 mb-4">

                    <label class="fw-bold">Status Lowongan</label>

                    <br>

                    <?php if(\Carbon\Carbon::parse($lowongan->deadline)->isFuture()): ?>

                        <span class="badge bg-success fs-6">
                            🟢 Masih Dibuka
                        </span>

                    <?php else: ?>

                        <span class="badge bg-danger fs-6">
                            🔴 Sudah Ditutup
                        </span>

                    <?php endif; ?>

                </div>

            </div>

            <a href="<?php echo e(route('lowongan.index')); ?>" class="btn btn-secondary">
                ← Kembali
            </a>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Project_akhir_pemrograman_web\resources\views/lowongan/show.blade.php ENDPATH**/ ?>