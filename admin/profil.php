<?php
require_once '../controller/userController.php';

$id = dekripsi($_COOKIE['mGpTw']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

if (isset($_POST["edit_profil"])) {
  if (update_profil($_POST) > 0) {
    echo "
        <script>
        alert('Profil Berhasil Diubah');
        document.location.href='index.php';
        </script>
        ";
  } else {
    echo "<script>
        alert('Profil Gagal Diubah');
        document.location.href='profil.php';
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
            <h5 class="card-title fw-semibold mb-4">My Profile</h5>
            <br>
            <form method="post">
              <input type="hidden" name="iduser" value="<?= $user['iduser']; ?>">
              <input type="hidden" name="oldusername" value="<?= $user['username']; ?>">
              <input type="hidden" name="oldpassword" value="<?= $user['password']; ?>">
              <input type="hidden" name="oldemail" value="<?= $user['email']; ?>">

              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>"
                  id="exampleInputtext1" aria-describedby="textHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="pwd" value="<?= $user['password']; ?>"
                  id="exampleInputPassword1">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" name="pwd2" value="<?= $user['password']; ?>"
                  id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" id="exampleInputtext1"
                  aria-describedby="textHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>"
                  id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputtext1" class="form-label">Instansi</label>
                <input type="text" class="form-control" name="instansi" value="<?= $user['instansi']; ?>"
                  id="exampleInputtext1" aria-describedby="textHelp">
              </div>

              <button type="submit" name="edit_profil"
                class="btn btn-primary w-100 py-8 fs-4 mb-4 mt-3 rounded-2">Edit</button>

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