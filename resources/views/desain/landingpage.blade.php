<!DOCTYPE html>
<html>
<head>
    <title>PRO-LEDGE Login</title>
    <link rel="stylesheet" href="{{asset('landingpage.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Jacquard+12&family=Pinyon+Script&display=swap" rel="stylesheet">
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar">
        <a href="" class="navbar-logo">Pro-Ledge</a>

        <div class="navbar-utama">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="">Menu</a>
            <a href="#fitur">Fitur</a>
            <a href="#contact">Contact</a>
        </div>

            <div class="auth-buttons">
                <a href="{{ route('account.login') }}" class="login">Login</a>
                <a href="{{ route('account.register') }}" class="login">Sign Up</a>
            </div>
    </nav>

    {{-- Main Land --}}
    <section class="main" id="home">
        <main class="content">
            <h1>Pro-Ledge</h1>
            <p>Temukan Dunia Baru Bersama Pro-Ledge</p>
        </main>
    </section>

    {{-- About --}}
    <section id="about" class="about">
        <h2>Tentang Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="{{ asset('asset/4.png')}}" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Apa Itu Pro-Ledge</h3>
                <br>
                <p>Pro-Ledge adalah sebuah aplikasi yang didesain untuk membuat sebuah
                    perpustakaan online yang akan membantu kalian dalam membuat
                    peminjaman di perpustakaan.
                    <br>
                </p>
            </div>
        </div>
    </section>

    <section id="fitur" class="fitur">
        <h2>Fitur-Fitur</h2>
        <div class="row">
            <div class="about-img">
                <img src="{{ asset('asset/5.jpg')}}" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Apa Saja Fitur Yang Ada Di Pro-Ledge</h3>
                <br>
                <p>Beberapa fitur utama yang biasanya tersedia dalam aplikasi perpustakaan meliputi:<br>
                        Manajemen Koleksi: Menyimpan data buku, jurnal, majalah, dan bahan pustaka lainnya.<br><br>
                        Sistem Peminjaman dan Pengembalian: Modul untuk mengelola proses peminjaman dan pengembalian secara otomatis.
                        Katalog Online (OPAC): Katalog yang dapat diakses secara online oleh pengguna untuk mencari koleksi perpustakaan.<br><br>
                        Keanggotaan: Pengelolaan data anggota perpustakaan dan riwayat peminjaman.<br><br>
                        Pelaporan dan Statistik: Fitur untuk menghasilkan laporan peminjaman, statistik penggunaan, dan analisis data perpustakaan.
                        Reservasi Buku: Pengguna dapat melakukan reservasi buku yang sedang dipinjam oleh orang lain.<br><br>
                        Pemberitahuan Otomatis: Notifikasi untuk mengingatkan pengguna tentang batas waktu pengembalian atau denda. 
                </p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <h2>Contact</h2>
        <div class="row">
            <div class="about-img">
                <img src="{{ asset('asset/6.png')}}" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Yang Anda Bisa Hubungi Pro-Ledge</h3>
                <br>
                <p>In Below
                    <br>
                    <br>
                        Team Pro-Ledge Email proledgeteam@gmail.com<br>
                        Phone Number 085817553575<br>
                        Instagram proledge_team<br>

                </p>
            </div>
        </div>
    </section>
    {{-- <div class="container">
        @yield('konten')
    </div> --}}
</body>
</html>


