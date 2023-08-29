<?php
require_once 'controller/userController.php';

if (isset($_POST["submit"])) {
  if (register_user($_POST) > 0) {
    echo " 
    <script>
    alert('Registrasi Sukses');
    document.location.href='login.php';
    </script>
    ";
  } else {
    echo "<script>
    alert('Registrasi Gagal');
    </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SIPATITESA</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/Logo4.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-2 w-100">
                  <img src="assets/images/logos/Logo4.png" width="80" alt="" />
                </a>
                <p class="text-center">Silahkan Registrasi untuk Menggunakan SIPATITESA</p>
                <form method="post">
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="pwd" class="form-control" id="password">
                  </div>
                  <div class="mb-4">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="pwd2" class="form-control" id="password2">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi</label>
                    <input type="text" name="instansi" class="form-control" id="instansi">
                  </div>
                  <button type="submit" name="submit"
                    class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Submit</button>
                  <p class="text-end mt-3">
                    Sudah Punya Akun?
                    <u><a href="login.php">Login</a></u>
                  </p>
                  <div class="d-flex align-items-center justify-content-center">
                    <u><a class="text-primary fw-bold ms-2" href="../guest/tes.php">Masuk Sebagai Tamu?</a></u>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center  text-black fw-bold lebar">
    <p class="mb-0 fs-3"> &copy; <a href="#" target="_blank"
        class="pe-1 text-primary text-decoration">Maharanigilangpratiwi</a>2023</p>
  </footer>


  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>