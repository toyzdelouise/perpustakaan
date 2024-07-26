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
                
                <th class="col-md-1">Status</th>
                <th class="col-md-1">Aksi</th>
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
                
                <td>
                    <?php if($item->status == 'disetujui'): ?>
                        <span class="badge bg-success">Disetujui</span>
                    <?php elseif($item->status == 'batalkan'): ?>
                        <span class="badge bg-danger">Dibatalkan</span>
                    <?php elseif(is_null($item->status)): ?>
                        <span class="badge bg-warning">Belum Disetujui</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($item->status != 'disetujui'): ?>
                        <a href="<?php echo e(route('pinjam-buku.disetujui', $item->id)); ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-check"></i> Setujui
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('pinjam-buku.tolak', $item->id)); ?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batalkan
                        </a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(url('pengembalian-buku/'.$item->id)); ?>" class="btn btn-primary">Kembali</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('desain.sidebarAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/buku/index.blade.php ENDPATH**/ ?>