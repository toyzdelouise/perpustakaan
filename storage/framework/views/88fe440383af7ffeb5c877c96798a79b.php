<?php $__env->startSection('konten'); ?>
<?php if(Session::has('success')): ?>
    <div class="pt-3">
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(Session::has('gagal')): ?>
    <div class="pt-3">
        <div class="alert alert-danger">
            <?php echo e(Session::get('gagal')); ?>

        </div>
    </div>
<?php endif; ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="<?php echo e(route('account.dashboard')); ?>" class="btn btn-secondary">
        << Kembali
    </a>
    <div class="row mt-3">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($data->foto): ?>
            <div class="col mt-4 mb-3">
                <img style="max-height: 2000px; max-width: 200px" src="<?php echo e(url('foto') . '/' . $data->foto); ?>"
                    alt="" srcset="">
            </div>
        <?php endif; ?>
        <div class="col-md-8">
            <div class="mb-3 mt-4 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <?php echo e($data->id); ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_buku" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <?php echo e($data->nama_buku); ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <?php echo e($data->kategoris->kategori); ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <?php echo e($data->penerbits->penerbit); ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-10">
                    <?php echo e($data->tahun_terbit); ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                <div class="col-sm-10">
                    <?php echo e($data->stock); ?>

                </div>
            </div>
        </div>
        <div class="mb-3 mt-2 row">
            <a href="<?php echo e(route('account.peminjaman', $data->id)); ?>" class="btn btn-success">Pinjam</a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('desain.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/buku/bukudetailuser.blade.php ENDPATH**/ ?>