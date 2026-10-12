<?php $__env->startSection('title', 'Data Skema'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Skema Sertifikasi</h4>
    <?php if(auth()->user()->isAdmin()): ?>
        <a href="<?php echo e(route('skema.create')); ?>" class="btn btn-primary btn-sm">+ Tambah Skema</a>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $skemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($i + 1); ?></td>
                        <td><?php echo e($s->kode_skema); ?></td>
                        <td><?php echo e($s->nama_skema); ?></td>
                        <td>
                            <a href="<?php echo e(route('skema.show', $s->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <a href="<?php echo e(route('skema.edit', $s->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('skema.destroy', $s->id)); ?>" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus skema ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada data skema</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\JWD_Aplikasi_Peserta_Sertifikasii\resources\views/skema/index.blade.php ENDPATH**/ ?>