<?php $__env->startSection('title', 'Detail Skema'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between">
                <strong>Detail Skema</strong>
                <a href="<?php echo e(route('skema.index')); ?>" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="160" class="text-muted">Kode Skema</td>
                        <td class="fw-semibold"><?php echo e($skema->kode_skema); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Nama Skema</td>
                        <td><?php echo e($skema->nama_skema); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Deskripsi</td>
                        <td><?php echo e($skema->deskripsi ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Jumlah Peserta</td>
                        <td><?php echo e($skema->pesertas->count()); ?> orang</td>
                    </tr>
                </table>

                <?php if(auth()->user()->isAdmin()): ?>
                <div class="mt-3">
                    <a href="<?php echo e(route('skema.edit', $skema->id)); ?>" class="btn btn-warning btn-sm">Edit Data</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\JWD_Aplikasi_Peserta_Sertifikasii\resources\views/skema/show.blade.php ENDPATH**/ ?>