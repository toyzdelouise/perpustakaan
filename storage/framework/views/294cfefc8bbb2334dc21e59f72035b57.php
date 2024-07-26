<!DOCTYPE html>
<html>
<head>
    <title>PRO-LEDGE Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('landingpage.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Jacquard+12&family=Pinyon+Script&display=swap" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar">
        <a href="" class="navbar-logo">Pro-Ledge</a>

        <div class="navbar-utama">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="">Menu</a>
            <a href="">Contact</a>
        </div>

            <div class="auth-buttons">
                <a href="<?php echo e(route('account.login')); ?>" class="login">Login</a>
                <a href="<?php echo e(route('account.register')); ?>" class="login">Sign Up</a>
            </div>
    </nav>

    
    <section class="main" id="home">
        <main class="content">
            <h1>Pro-Ledge</h1>
            <p>Temukan Dunia Baru Bersama Pro-Ledge</p>
        </main>
    </section>

    
    <section id="about" class="about">
        <h2>Tentang Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="<?php echo e(asset('asset/4.jpg')); ?>" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Apa Itu Pro-Ledge</h3>
                <p>Pro-Ledge adalah sebuah aplikasi yang didesain untuk membuat sebuah
                    perpustakaan online yang akan membantu kalian dalam membuat
                    peminjaman di perrpustakaan.
                </p>
            </div>
        </div>
    </section>
    
</body>
</html>


<?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/desain/landingpage.blade.php ENDPATH**/ ?>