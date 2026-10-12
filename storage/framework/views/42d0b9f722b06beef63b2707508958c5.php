<?php $__env->startSection('title', 'Data Peserta'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Peserta Sertifikasi</h4>
    <?php if(auth()->user()->isAdmin()): ?>
        <a href="<?php echo e(route('peserta.create')); ?>" class="btn btn-primary btn-sm">+ Tambah Peserta</a>
    <?php endif; ?>
</div>


<form method="GET" action="<?php echo e(route('peserta.index')); ?>" class="mb-3">
    <div class="input-group" style="max-width: 450px;">
        <input type="text" name="search" class="form-control" placeholder="Cari nama, NIK, email..." value="<?php echo e($search); ?>">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
        <?php if($search): ?>
            <a href="<?php echo e(route('peserta.index')); ?>" class="btn btn-outline-danger">Reset</a>
        <?php endif; ?>
    </div>
</form>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Skema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pesertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($i + 1); ?></td>
                        <td><?php echo e($p->nama); ?></td>
                        <td><?php echo e($p->nik); ?></td>
                        <td><?php echo e($p->email ?? '-'); ?></td>
                        <td><?php echo e($p->no_hp ?? '-'); ?></td>
                        <td><?php echo e($p->skema->nama_skema ?? '-'); ?></td>
                        <td>
                            <a href="<?php echo e(route('peserta.show', $p->id)); ?>" class="btn btn-info btn-sm">Detail</a>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <a href="<?php echo e(route('peserta.edit', $p->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('peserta.destroy', $p->id)); ?>" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Tidak ada data peserta</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\JWD_Aplikasi_Peserta_Sertifikasii\resources\views/peserta/index.blade.php ENDPATH**/ ?>