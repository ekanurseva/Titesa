<?php
require_once '../controller/tesController.php';
if (isset($_COOKIE['cf_besar']) || isset($_COOKIE['kategori_terpilih']) || isset($_COOKIE['hasil'])) {
    setcookie('cf_besar', '', time() - 3600);
    setcookie('kategori_terpilih', '', time() - 3600);
    setcookie('hasil', '', time() - 3600);
}

$jumlah_pertanyaan = jumlah_data("SELECT * FROM pertanyaan");

$jumper1 = ceil($jumlah_pertanyaan / 2);
$jumper2 = $jumlah_pertanyaan - $jumper1;

$pertanyaan1 = query("SELECT * FROM pertanyaan LIMIT $jumper1");
$pertanyaan2 = query("SELECT * FROM pertanyaan LIMIT $jumper2 OFFSET $jumper1");

$jawaban = query("SELECT * FROM jawaban");

if (isset($_POST['submit'])) {
    $data_kategori = query("SELECT * FROM tingkattekanan_stres");
    $data_karakteristik = query("SELECT * FROM karakteristik");
    $pertanyaan = query("SELECT * FROM pertanyaan");

    // Ambil CF User
    $nilai_user = array();
    $nama_pertanyaan = array();

    foreach ($pertanyaan as $pertanyaan) {
        $parameter = $pertanyaan['kode_pertanyaan'];
        $nama_pertanyaan[] = $parameter;

        $jawaban = $_POST[$parameter];
        $nilai = query("SELECT bobot FROM jawaban WHERE kode_jawaban = '$jawaban'")[0];
        $nilai_user[] = $nilai['bobot'];
    }

    $bayes_terbesar = array();

    foreach ($data_karakteristik as $krit) {
        $nama_karakteristik[] = $krit['karakteristik'];
        $kode_karakteristik = $krit['kode_karakteristik'];
        ${"sigma_" . $kode_karakteristik} = 0;
        ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} = 0;

        $idkarakteristik = $krit['idkarakteristik'];

        $data_indikator = query("SELECT * FROM indikator WHERE idkarakteristik = $idkarakteristik");

        foreach ($data_indikator as $di) {
            $idindikator = $di['idindikator'];

            $data_pertanyaan = query("SELECT * FROM pertanyaan WHERE idindikator = $idindikator");

            foreach ($data_pertanyaan as $dp) {
                ${"sigma_" . $kode_karakteristik} += $dp['bobot'];
            }

            foreach ($data_pertanyaan as $dape) {
                ${"h_" . $dape['kode_pertanyaan']} = (${"sigma_" . $kode_karakteristik} == 0) ? 0 : $dape['bobot'] / ${"sigma_" . $kode_karakteristik};

                $kata2 = $dape['kode_pertanyaan'];
                $indeks2 = array_search($kata2, $nama_pertanyaan);

                $hitung2 = $nilai_user[$indeks2] * ${"h_" . $dape['kode_pertanyaan']};
                ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} += $hitung2;
            }

            ${"bayes_" . $kode_karakteristik} = 0;
            foreach ($data_pertanyaan as $dapert) {
                $kata3 = $dapert['kode_pertanyaan'];
                $indeks3 = array_search($kata3, $nama_pertanyaan);

                $hitung3 = $nilai_user[$indeks3] * ${"h_" . $dapert['kode_pertanyaan']};
                ${"p_h_e_" . $dapert['kode_pertanyaan']} = (${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} == 0) ? 0 : $hitung3 / ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik};

                ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']} = ${"p_h_e_" . $dapert['kode_pertanyaan']} * $dapert['bobot'];

                ${"bayes_" . $kode_karakteristik} += ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']};
            }

            ${"hd_" . $kode_karakteristik} = number_format(${"bayes_" . $kode_karakteristik} * 100, 2);

            // echo "Hasil Perhitungan Bayes dari " . $krit['kode_karakteristik'] . " adalah " . ${"hd_" . $krit['kode_karakteristik']} . "<br><br>";

            $bayes_terbesar[] = ${"hd_" . $kode_karakteristik};
        }
    }

    $cf_besar = max($bayes_terbesar);

    // echo "Hasil BAYES TERGEDE adalah " . $cf_besar;

    // Total Bobot untuk kategori
    $cf_total = 0;

    for ($s = 0; $s < count($bayes_terbesar); $s++) {
        $cf_total += $bayes_terbesar[$s];
    }

    // echo "bobot kategori adalah = " . $cf_total . "<br>";

    $kategori_terpilih = '';

    // Memeriksa nilai total pada setiap kategori
    foreach ($data_kategori as $kategori) {
        if ($cf_total >= $kategori['range_bawah'] && $cf_total <= $kategori['range_atas']) {
            $kategori_terpilih = $kategori['tekanan'];
            break; // Hentikan perulangan jika kategori ditemukan
        }
    }

    // Set cookie dengan hasil perhitungan
    setcookie('cf_besar', $cf_besar, time() + 10800); // Cookie berlaku selama 3 jam
    setcookie('kategori_terpilih', $kategori_terpilih, time() + 10800);

    // Redirect ke halaman guest.php
    header('Location: ../hasil/guest.php');
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
                                        <img src="assets/images/logos/Logo4.png" width="50" alt="" />
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
                                <a href="tes2.php">
                                    <button type="submit" class="btn btn-secondary w-100 py-8 fs-4 mb-4 rounded-2"
                                        name=" submit">Submit</button>
                                </a>

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