<?php $__env->startSection('konten'); ?>
<div class="container mt-4">
    <div class="pb-3">
        <form class="d-flex" action="<?php echo e(url('buku')); ?>" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="<?php echo e(Request::get('katakunci')); ?>"
                placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">User</th>
                <th class="col-md-2">Buku</th>
                <th class="col-md-2">Tanggal Peminjaman</th>
                <th class="col-md-2">Tanggal Pengembalian</th>
                <th class="col-md-1">Denda</th>
                <th class="col-md-1">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($item->userss->name); ?></td>
                <td><?php echo e($item->bukus->nama_buku); ?></td>
                <td><?php echo e($item->tangal_peminjaman); ?></td>
                <td><?php echo e($item->tanggal_pengembalian); ?></td>
                <td><?php echo e($item->denda); ?></td>
                <td>
                    <span class="badge bg-success"><?php echo e($item->status); ?></span>
                </td>
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('desain.sidebarAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/buku/pengembalian.blade.php ENDPATH**/ ?>