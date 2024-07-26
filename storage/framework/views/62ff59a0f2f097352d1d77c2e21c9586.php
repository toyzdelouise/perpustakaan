<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRO-LEDGE Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('dashboard.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Jacquard+12&family=Pinyon+Script&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="sidebar">
        <div class="logo-detail">
            <i class='bx bx-menu-alt-left'></i>
            <span>Pro-Ledge</span>
        </div>
        <ul class="nav-links">
            <div class="dashboard">
                <a href="#">
                    <i class='bx bxs-grid-alt'></i>
                    <span>Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </div>
            <div class="Favorit">
                <a href="#">
                    <i class='bx bx-bookmark-alt'></i>
                    <span>Favorit</span>
                </a>
                <span class="tooltip">Favorit</span>
            </div>
            <div class="peminjaman">
                <a href="<?php echo e(route('pinjam-buku')); ?>">
                    <i class='bx bx-book-reader'></i>
                    <span>Peminjaman</span>
                </a>
                <span class="tooltip">Peminjaman</span>
            </div>
            <div class="logout" style="margin-top: 19rem">
                <a href="<?php echo e(route('account.logout')); ?>" class="logout-link">
                    <i class='bx bxs-door-open'></i>
                    <span>Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </div>
        </ul>
    </div>
    <div class="home-section">
        <div class="container">
            <?php echo $__env->yieldContent('konten'); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\projeklaravel\apperpustakaan\resources\views/desain/sidebar.blade.php ENDPATH**/ ?>