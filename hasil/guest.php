<?php
// Cek apakah hasil perhitungan ada dalam cookie
if (isset($_COOKIE['cf_besar']) && isset($_COOKIE['kategori_terpilih'])) {
    $cf_besar = $_COOKIE['cf_besar'];
    $kategori_terpilih = $_COOKIE['kategori_terpilih'];

    // Hapus cookie yang sudah tidak diperlukan lagi
    setcookie('cf_besar', '', time() - 3600);
    setcookie('kategori_terpilih', '', time() - 3600);
} else {
    echo "Hasil perhitungan tidak tersedia.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIPATITESA</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/Logo4.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="index.php" class="text-nowrap logo-img">
                        <h1 class="fw-bold text-primary m-0">SIPA<span class="text-secondary">TITESA</span></h1>
                        <!-- <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" /> -->
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../tes/guest.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Tes</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Autentikasi</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../login.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../registrasi.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user-plus"></i>
                                </span>
                                <span class="hide-menu">Registrasi</span>
                            </a>
                        </li>
                    </ul>
                    <div class="unlimited-access-img">
                        <img src="../assets/images/backgrounds/meditasi.png" alt="" class="img-fluid">
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link text-primary active" href="profil.php"> My Profile</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>


            <div class="p-4 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <br>
                    <h1 class="display-5 fw-bold text-center mb-4">Hasil Tes</h1>

                    <h3 class="text-center mb-4">Tingkat Tekanan Stres Akademik Anda Adalah:</h3>

                    <div style="border: 0.7px solid black; padding: 40px 30px;">
                        <h1 class="text-center mb-3">
                            <?= $cf_besar ?>%
                        </h1>
                        <h3 class="text-center">Tingkat Tekanan Stres
                            <?= $kategori_terpilih ?>
                        </h3>
                    </div>

                    <!-- <div>
                        <ul class="fw-bold mb-0 justify fs-6">Solusi Penanganan:</ul>
                        <?php foreach ($solusi as $ds): ?>
                            <li class="ms-4">
                                <?= $ds['solusi']; ?>
                            </li>
                        <?php endforeach; ?>
                    </div> -->

                    <div class="text-center mt-5">
                        <a class="btn btn-primary btn-lg" href="../print.php?idhasil=" target="_blank">Cetak</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <footer class="text-center text-black fw-bold lebar">
        <p class="mb-0 fs-3">&copy; <a href="#" target="_blank"
                class="pe-1 text-primary text-decoration">Maharanigilangpratiwi</a>2023</p>
    </footer>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>