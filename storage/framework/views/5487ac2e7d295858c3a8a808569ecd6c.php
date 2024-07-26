 
 <!-- START DATA -->
 <?php $__env->startSection('konten'); ?>
     <?php if(Session::has('success')): ?>
         <div class="pt-3">
             <div class="alert alert-success">
                 <?php echo e(Session::get('success')); ?>

             </div>
         </div>
     <?php endif; ?>

     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <!-- FORM PENCARIAN -->
         <div class="pb-3">
             <form class="d-flex" action="<?php echo e(url('buku')); ?>" method="get">
                 <input class="form-control me-1" type="search" name="katakunci" value="<?php echo e(Request::get('katakunci')); ?>"
                     placeholder="Masukkan kata kunci" aria-label="Search">
                 <button class="btn btn-secondary" type="submit">Cari</button>
             </form>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">No</th>
                     <th class="col-md-1.5">Foto</th>
                     <th class="col-md-1.2">ID</th>
                     <th class="col-md-1.5">Judul</th>
                     <th class="col-md-1.5">Kategori</th>
                     <th class="col-md-2">Tahun Terbit</th>
                     <th class="col-md-1">Stock</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = $data->firstItem(); ?>
                 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                         <td><?php echo e($i); ?></td>
                         <td>
                             <?php if($item->foto): ?>
                                 <img style="max-width:50px; max-heigt:50;" src="<?php echo e(url('foto') . '/' . $item->foto); ?>"
                                     alt="">
                             <?php endif; ?>
                         </td>
                         <td><?php echo e($item->id); ?></td>
                         <td><?php echo e($item->nama_buku); ?></td>
                         <td>
                             <?php if($item->kategoris): ?>
                                 <?php echo e($item->kategoris->kategori); ?>

                             <?php else: ?>
                                 <p style="">Data Tidak Tersedia</p>
                             <?php endif; ?>
                         </td>
                         <td><?php echo e($item->tahun_terbit); ?></td>
                         <td><?php echo e($item->stock); ?></td>
                         <td>
                            <a href="<?php echo e(route('account.show', $item->id)); ?>" class="btn btn-secondary btn-sm">Detail</a>
                         </td>
                     </tr>
                     <?php $i++; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </tbody>
         </table>

     </div>
     <!-- AKHIR DATA -->
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('user.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/buku/user.blade.php ENDPATH**/ ?>