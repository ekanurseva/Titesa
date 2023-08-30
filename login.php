<?php
require_once 'controller/userController.php';

if (isset($_POST["submit_login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  //cek username apakah ada di database atau tidak
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // mysqli_num_rows() untuk mengetahui ada berapa baris data yang dikembalikan
  if (mysqli_num_rows($result) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($result);

    //password_verify() untuk mengecek apakah sebuah password itu sama atau tidak dengan hash nya
    //parameternya yaitu string yang belum diacak dan string yang sudah diacak
    if (password_verify($password, $row["password"])) {
      $enkripsi = enkripsi($row['iduser']);
      setcookie('mGpTw', $enkripsi, time() + 10800);

      if ($row["level"] === "Admin") {
        echo "<script>
                  document.location.href='admin';
              </script>";
        exit;
      } elseif ($row["level"] === "User") {
        echo "<script>
                  document.location.href='user';
              </script>";
        exit;
      }
    }
  }
  $error = true;
}

?>
<!DOCTYPE html>
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
                <a href="login.php" class="text-nowrap logo-img text-center d-block py-2 w-100">
                  <img src="assets/images/logos/Logo4.png" width="80" alt="" />
                </a>
                <P class="text-center mb-4 fw-bold">Silahkan Login untuk Masuk ke SIPATITESA</P>

                <form method="post" action="">
                  <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                      Username/Password Salah
                    </div>
                  <?php endif; ?>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" />
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="show-password" />
                      <label class="form-check-label text-dark" id="show-password" for="flexCheckChecked"> Tampil
                        Password </label>
                    </div>
                    <a class="text-primary fw-bold" href="" data-bs-toggle="modal" data-bs-target="#myModal">Lupa
                      Password ?</a>
                  </div>
                  <button type="submit" name="submit_login"
                    class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <u><a class="text-primary fw-bold ms-2" href="registrasi.php">Buat Akun?</a></u>
                    <u><a class="text-primary fw-bold ms-2" href="tes/guest.php">Masuk Sebagai Tamu?</a></u>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <form action="sendemail.php" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Masukkan Email</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button>
                </div>
              </form>
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
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const passwordInput = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('show-password');

    showPasswordCheckbox.addEventListener('change', function () {
      passwordInput.type = this.checked ? 'text' : 'password';
    });
  </script>
</body>

</html>