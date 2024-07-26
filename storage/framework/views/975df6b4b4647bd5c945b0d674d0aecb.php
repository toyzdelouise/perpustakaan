<!DOCTYPE html>
<html>
<head>
    <title>PRO-LEDGE Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('login.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Jacquard+12&family=Pinyon+Script&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container container-custom" style="background-color: rgb(39, 158, 3);width: 100vw; height: 100vh;">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-2">
                <img src="<?php echo e(asset('asset/3.jpeg')); ?>" alt="Login" class="img-fluid" style="width: 150%; height: 100%;">
            </div>
            <div class="col-md-10 d-flex justify-content-center">
                <div class="page" style="width: 430px; height: 100%;background: linear-gradient(45deg, rgb(155, 214, 148), rgb(50, 109, 65));margin-left: 21%;padding: 2rem;border-radius: 10px;">
                    <h1 style="text-align: left;color: white;font-weight: 300;font-size: 3rem;margin-bottom: 0.5rem;margin-top: 15%">Login</h1>
                    <p style="text-align: left;color: white; font-size: 1rem;margin-bottom: 3rem;">Welcome Back! Please Login To Your Account.</p>
                    <form action="<?php echo e(route('account.authenticate')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="email" class="form-label" style="color: rgb(248, 248, 247); font-size: 1rem" >Email</label>
                            <input type="text" id="email" value="<?php echo e(old('email')); ?>" name="email"
                                   class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="name@gmail.com" style="background-color: rgba(255, 255, 255, 0);width: 100%;padding: 0.75rem;margin-top: 0.5rem;margin-bottom: 0.5rem;border: 2px solid #104e2f;border-radius: 10px;">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label for="password" class="form-label" style="color: white">Password</label>
                            <input type="password" id="password" value="<?php echo e(old('password')); ?>" name="password"
                                   class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="password" style="background-color: rgba(255, 255, 255, 0);width: 100%;padding: 0.75rem;margin-top: 0.5rem;margin-bottom: 0.5rem;border: 2px solid #104e2f;border-radius: 10px;">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group form-check" style="margin-bottom: 1rem;">
                            <input type="checkbox" id="remember_me" name="remember_me" class="form-check-input">
                            <label for="remember_me" class="form-check-label" style="color: white">Remember Me</label>
                            <a href="" style="margin-left: 140px; text-decoration: underline; transform: scaleX(2);">Forget Password?</a>
                        </div>
                        <button id="myButton">Log In</button>
                        <span style="color: white; text-align:center; margin: 5.5rem">Don't Have Account?<a href="<?php echo e(route('account.register')); ?>" style="color: rgb(191, 243, 48);text-decoration: underline; transform: scaleX(2);">Register</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Abdullah Singkar\Documents\apperpustakaan\resources\views/desain/login.blade.php ENDPATH**/ ?>