<?php
require_once '../controller/kriteriaController.php';
hapus_cookie();
// $id = dekripsi($_COOKIE['mGpTw']);
// $user = query("SELECT * FROM user WHERE iduser = $id")[0];

$idkriteria = $_GET['id'];
$kriteria = query("SELECT * FROM karakteristik WHERE idkarakteristik = $idkriteria")[0];


if (isset($_POST["edit_kriteria"])) {
  if (update_kriteria($_POST) > 0) {
    echo "
        <script> 
        alert('Data Admin Berhasil Diubah');
        document.location.href='kriteria.php';
        </script>
        ";
  } else {
    echo "<script>
        alert('Data Admin Gagal Diubah');
        document.location.href='kriteria.php';
        </script>";
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
    <?php
    require_once '../sidebar/sidebar_admin.php';
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
            <h1 class="card-title fw-semibold mb-4">Data Kriteria</h1>
            <form action="" method="post">
              <input type="hidden" name="idkriteria" value="<?= $kriteria['idkarakteristik']; ?>">

              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Kode Kriteria :</label>
                <input type="text" name="kode" class="form-control" value="<?= $kriteria['kode_karakteristik'] ?>"
                  readonly id="exampleInputtext1">
              </div>
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Kriteria :</label>
                <input type="text" name="karakteristik" value="<?= $kriteria['karakteristik']; ?>" class="form-control"
                  id="exampleInputtext1">
              </div>
              <div class="mb-4">
                <label for="comment">Deskripsi :</label>
                <textarea class="form-control" rows="2" id="comment"
                  name="deskripsi"><?= $kriteria['deskripsi']; ?></textarea>

                <button type="submit" name="edit_kriteria"
                  class="btn btn-primary w-100 py-8 fs-4 mb-4 mt-3 rounded-2">Simpan</button>
            </form>
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