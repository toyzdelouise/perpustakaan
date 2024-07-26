<?php $__env->startSection('konten'); ?>
    <form action='<?php echo e(url('buku/'.$data->id)); ?>' method='post' enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="<?php echo e(route('admin.tampilan')); ?>" class="btn btn-secondary"><< Kembali</a>
            <div class="row mt-3">
                <?php if($data->foto): ?>
                    <div class="col mt-4 mb-3">
                        <img style="max-height: 2000px;max-width: 200px" src="<?php echo e(url('foto').'/'.$data->foto); ?>" alt="" srcset="">
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
                            <div class="col-sm-10">
                                <?php echo e($data->nama_buku); ?>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <?php echo e($data->kategoris->kategori); ?>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <?php echo e($data->penerbits->penerbit); ?>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10" >
                            <div class="col-sm-10">
                                <?php echo e($data->tahun_terbit); ?>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10" >
                            <div class="col-sm-10">
                                <?php echo e($data->stock); ?>

                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('desain.sidebarAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/admin/bukudetail.blade.php ENDPATH**/ ?>