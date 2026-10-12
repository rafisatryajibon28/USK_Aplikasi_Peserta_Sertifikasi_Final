<?php $__env->startSection('title', 'Detail Peserta'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Detail Peserta</strong>
                <a href="<?php echo e(route('peserta.index')); ?>" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td width="180" class="text-muted">Nama Lengkap</td>
                        <td class="fw-semibold"><?php echo e($peserta->nama); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">NIK</td>
                        <td><?php echo e($peserta->nik); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email</td>
                        <td><?php echo e($peserta->email ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">No. HP</td>
                        <td><?php echo e($peserta->no_hp ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Alamat</td>
                        <td><?php echo e($peserta->alamat ?? '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Skema Sertifikasi</td>
                        <td>
                            <?php if($peserta->skema): ?>
                                <?php echo e($peserta->skema->kode_skema); ?> - <?php echo e($peserta->skema->nama_skema); ?>

                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>

                <?php if(auth()->user()->isAdmin()): ?>
                <div class="mt-3">
                    <a href="<?php echo e(route('peserta.edit', $peserta->id)); ?>" class="btn btn-warning btn-sm">Edit Data</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\JWD_Aplikasi_Peserta_Sertifikasii\resources\views/peserta/show.blade.php ENDPATH**/ ?>