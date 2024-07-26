<?php $__env->startSection('konten'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

<div class="mt-5">
    <?php if(Session('message')): ?>
    <div class="pt-3">
        <div class="alert <?php echo e(session('alert-class')); ?>">
            <?php echo e(Session('message')); ?>

        </div>
    </div>
    <?php endif; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <h1 class="mb-5">Book Rent</h1>
            <!-- Single form for book rental process -->
            <form action="<?php echo e(route('admin.book-rent')); ?>" method="post">
                <?php echo csrf_field(); ?>  <!-- CSRF token for security -->
                <div class="mb-3">
                    <label for="user" class="col-form-label">User</label>
                    <select name="user_id" id="user" class="form-control userbox">
                        <option value="">Select User</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="book" class="col-form-label">Book</label>
                    <select name="book_id" id="book" class="form-control userbox">
                        <option value="">Select Book</option>
                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($book->id); ?>"><?php echo e($book->nama_buku); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.userbox').select2();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('desain.tampilanAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/admin/booksss.blade.php ENDPATH**/ ?>