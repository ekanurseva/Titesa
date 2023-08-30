<?php
require_once '../controller/tesController.php';

$id = dekripsi($_COOKIE['mGpTw']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

if (isset($_GET['idhasil'])) {
  $idhasil = ($_GET['idhasil']);

  $data_hasil = query("SELECT * FROM hasil WHERE idhasil = $idhasil")[0];
} else {
  $data_hasil = query("SELECT * FROM hasil WHERE iduser = $id AND idhasil = (SELECT MAX(idhasil) FROM hasil WHERE iduser = $id)")[0];
}

$nama_kategori = $data_hasil['hsl_tekanan'];

$kategori = query("SELECT * FROM tingkattekanan_stres WHERE tekanan = '$nama_kategori'")[0];

$idkategori = $kategori['idtekanan'];
$solusi = query("SELECT * FROM solusi WHERE idtekanan = $idkategori");
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
    <?php
    // Cek peran pengguna dan masukkan file sidebar yang sesuai
    if ($user['level'] === "User") {
      require_once('../sidebar/sidebar_user.php');
    } elseif ($user['level'] === "Admin") {
      require_once('../sidebar/sidebar_admin.php');
    } else {
      // Jika peran tidak dikenali, Anda dapat menambahkan pesan error atau tindakan lain sesuai kebutuhan
      echo "Error: Peran pengguna tidak valid.";
    }
    ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item">
              <?php
              if ($user['level'] === "User") {
                echo '<a class="nav-link text-primary active" href="../user/profil.php"> My Profile</a>';
              } else {
                echo '<a class="nav-link text-primary active" href="../admin/profil.php"> My Profile</a>';
              }
              ?>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      <div class="p-4 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <br>
          <h1 class="display-5 fw-bold text-center mb-4">Hasil Tes</h1>
          <h3 class="text-center fw-bold">
            <?= $user['nama']; ?>
            <?= $user['instansi']; ?>
          </h3>

          <h3 class="text-center mb-4">Tingkat Tekanan Stres Akademik Anda Adalah:</h3>

          <div style="border: 0.7px solid black; padding: 40px 30px;">
            <h1 class="text-center mb-3">
              <?= $data_hasil['bobot']; ?>%
            </h1>
            <h3 class="text-center">Tingkat Tekanan Stres
              <?= $data_hasil['hsl_tekanan']; ?>
            </h3>
          </div>

          <div>
            <ul class="fw-bold mb-0 justify fs-6">Solusi Penanganan:</ul>
            <?php foreach ($solusi as $ds): ?>
                <li class="ms-4">
                  <?= $ds['solusi']; ?>
                </li>
            <?php endforeach; ?>
          </div>

          <div class="text-center mt-5">
            <a class="btn btn-primary btn-lg" href="../print.php?idhasil=<?= $data_hasil['idhasil']; ?>"
              target="_blank">Cetak</a>
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