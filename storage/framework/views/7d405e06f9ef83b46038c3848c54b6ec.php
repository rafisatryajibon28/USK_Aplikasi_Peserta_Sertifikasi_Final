<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Dashboard</h4>
    <span class="text-muted">Halo, <?php echo e($user->name); ?>!</span>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="text-muted small">Total Peserta</div>
                <div class="fs-3 fw-bold"><?php echo e($totalPeserta); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card" style="border-left-color:#198754;">
            <div class="card-body">
                <div class="text-muted small">Total Skema</div>
                <div class="fs-3 fw-bold"><?php echo e($totalSkema); ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card" style="border-left-color:#fd7e14;">
            <div class="card-body">
                <div class="text-muted small">Total User</div>
                <div class="fs-3 fw-bold"><?php echo e($totalUser); ?></div>
            </div>
        </div>
    </div>
</div>

<?php if(auth()->user()->isAdmin()): ?>
<div class="mb-4">
    <a href="<?php echo e(route('peserta.create')); ?>" class="btn btn-primary btn-sm me-2">+ Tambah Peserta</a>
    <a href="<?php echo e(route('skema.create')); ?>" class="btn btn-success btn-sm me-2">+ Tambah Skema</a>
    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-warning btn-sm">+ Tambah User</a>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-header bg-white">
        <strong>Peserta Terbaru</strong>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Skema</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pesertaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($i + 1); ?></td>
                        <td><?php echo e($p->nama); ?></td>
                        <td><?php echo e($p->nik); ?></td>
                        <td><?php echo e($p->skema->nama_skema ?? '-'); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Belum ada data peserta</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\JWD_Aplikasi_Peserta_Sertifikasii\resources\views/dashboard.blade.php ENDPATH**/ ?>