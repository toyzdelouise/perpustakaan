<?php $__env->startSection('konten'); ?>
    <?php if($errors->any()): ?>
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <form action='<?php echo e(route('book.update', $data->id)); ?>' method='post' enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="<?php echo e(route('account.dashboard')); ?>" class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <?php echo e($data->id); ?>

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <?php if($data->foto): ?>
                                <input type="file" class="form-control" name='foto' id="foto">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_buku" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_buku' value="<?php echo e($data->nama_buku); ?>"
                                id="nama_buku">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%" name="kategori" id="kategori">
                                <option disabled value>Pilih Kategori</option>
                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->kategori); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%" name="penerbit" id="penerbit">
                                <option disabled value>Pilih penerbit</option>
                                <?php $__currentLoopData = $penerbit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->penerbit); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <select name="tahun_terbit" id="tahun_terbit" class="form-control">
                                <option value="">Tahun Terbit</option>
                                <?php for($tahun = date('Y'); $tahun >= 1900; $tahun--): ?>
                                    <option value="<?php echo e($tahun); ?>"
                                        <?php echo e($data->tahun_terbit == $tahun ? 'selected' : ''); ?>><?php echo e($tahun); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='stock' value="<?php echo e($data->stock); ?>"
                                id="stock">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
    </form>
    </div>
    <!-- AKHIR FORM -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('desain.tampilan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/buku/bukuedit.blade.php ENDPATH**/ ?>