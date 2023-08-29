<?php
require_once '../controller/tesController.php';
hapus_cookie();
// if (isset($_COOKIE['cf_besar']) || isset($_COOKIE['kategori_terpilih']) || isset($_COOKIE['hasil'])) {
//     setcookie('cf_besar', '', time() - 3600);
//     setcookie('kategori_terpilih', '', time() - 3600);
//     setcookie('hasil', '', time() - 3600);
// }

$jumlah_pertanyaan = jumlah_data("SELECT * FROM pertanyaan");

$jumper1 = ceil($jumlah_pertanyaan / 2);
$jumper2 = $jumlah_pertanyaan - $jumper1;

$pertanyaan1 = query("SELECT * FROM pertanyaan LIMIT $jumper1");
$pertanyaan2 = query("SELECT * FROM pertanyaan LIMIT $jumper2 OFFSET $jumper1");

$jawaban = query("SELECT * FROM jawaban");

if (isset($_POST['submit'])) {
    if(hitung($_POST > 0)) {
        echo "
            <script>
                document.location.href='hasil.php';
            </script>
          ";
    } else {
        echo "
            <script>
                document.location.href='guest.php';
            </script>
          ";
    }
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
                            <a class="sidebar-link" href="guest.php" aria-expanded="false">
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
            <!--  Header End -->


            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <section class="pt-1 text-center container">
                            <div class="row pt-lg-5">
                                <div class="col-lg-6 col-md-8 mx-auto">
                                    <a href="" class="text-nowrap logo-img text-center d-block py-2 w-100">
                                        <img src="../assets/images/logos/Logo4.png" width="50" alt="" />
                                    </a>
                                    <h3 class="fw-bold">Tes Tingkat Tekanan Stres Akademik</h3>
                                    <p class="lead">Jawablah pertanyaan dibawah ini !</p>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </section>
                        <!-- Daftar Pertanyaan -->
                        <form action="" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                        $i = 1;
                                        foreach ($pertanyaan1 as $p1):
                                            ?>
                                            <h6 class="mb-2 mt-4">
                                                <?= $i; ?>.
                                                <?= $p1['pertanyaan']; ?>
                                            </h6>
                                            <?php foreach ($jawaban as $jawab): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        value="<?= $jawab['kode_jawaban']; ?>"
                                                        id="<?= $jawab['kode_jawaban'] . $p1['kode_pertanyaan']; ?>"
                                                        name="<?= $p1['kode_pertanyaan']; ?>" required>
                                                    <label class="form-check-label"
                                                        for="<?= $jawab['kode_jawaban'] . $p1['kode_pertanyaan']; ?>">
                                                        <?= $jawab['jawaban']; ?>
                                                    </label>
                                                </div>
                                                <?php
                                            endforeach;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </div>
                                    <div class="col-6">
                                        <?php foreach ($pertanyaan2 as $p2):
                                            ?>
                                            <h6 class="mb-2 mt-4">
                                                <?= $i; ?>.
                                                <?= $p2['pertanyaan']; ?>
                                            </h6>
                                            <?php foreach ($jawaban as $jawab): ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        value="<?= $jawab['kode_jawaban']; ?>"
                                                        id="<?= $jawab['kode_jawaban'] . $p2['kode_pertanyaan']; ?>"
                                                        name="<?= $p2['kode_pertanyaan']; ?>" required>
                                                    <label class="form-check-label"
                                                        for="<?= $jawab['kode_jawaban'] . $p2['kode_pertanyaan']; ?>">
                                                        <?= $jawab['jawaban']; ?>
                                                    </label>
                                                </div>
                                                <?php
                                            endforeach;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-secondary w-100 py-8 fs-4 mb-4 rounded-2" name="submit">Submit</button>
                        </form>
                        <!-- Daftar Pertanyaan Selesai-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-black fw-bold lebar">
        <p class="mb-0 fs-3">&copy; <a href="#" target="_blank"
                class="pe-1 text-primary text-decoration">Maharanigilangpratiwi</a>2023</p>
    </footer>

    <script>

    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>