<?php $__env->startSection('title', 'Kelola User'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Kelola User</h4>
    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm">+ Tambah User</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($i + 1); ?></td>
                        <td><?php echo e($u->name); ?></td>
                        <td><?php echo e($u->email); ?></td>
                        <td>
                            <span class="badge <?php echo e($u->role === 'admin' ? 'bg-primary' : 'bg-secondary'); ?>">
                                <?php echo e($u->role); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('users.edit', $u->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <?php if($u->id !== auth()->id()): ?>
                            <form action="<?php echo e(route('users.destroy', $u->id)); ?>" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus user ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada user</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\JWD_Aplikasi_Peserta_Sertifikasii\resources\views/users/index.blade.php ENDPATH**/ ?>