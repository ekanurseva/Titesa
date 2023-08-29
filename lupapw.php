<?php
require_once 'controller/userController.php';

$email = dekripsi($_GET['key']);

$data = query("SELECT * FROM user WHERE email = '$email'")[0];

if (isset($_POST['submit'])) {
    $iduser = $_POST['iduser'];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    if ($password !== $password2) {
        $error = true;
    } else {
        $password = password_hash($password2, PASSWORD_DEFAULT);

        $query = "UPDATE user SET 
                      password = '$password'
                    WHERE iduser = '$iduser'
                  ";
        mysqli_query($conn, $query);

        echo "
            <script>
                alert('Password berhasil diubah, silahkan login');
                document.location.href='login.php';
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
                                    <input type="hidden" name="iduser" value="<?= $data['iduser']; ?>">
                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            Password tidak sesuai
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            value="<?= $data['nama']; ?>" readonly />
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password2" id="password" />
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="show-password" />
                                            <label class="form-check-label text-dark" id="show-password"
                                                for="flexCheckChecked"> Tampil
                                                Password </label>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Simpan</button>
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