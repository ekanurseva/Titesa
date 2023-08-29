<?php
require_once '../controller/userController.php';

$data = query("SELECT * FROM user");

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
  <!-- Spinner Start -->

  <div class="spinner-border text-info" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>

  <!-- Spinner End -->

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
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Manajemen Pengguna</h5>

              <div class="row">
                <div class="col-4">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <br>
                      <p> <a href="admin.php" class="card-link"><i class="ti ti-user-plus fs-8"> Data Admin</i></a></p>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <br>
                      <p> <a href="users.php" class="card-link"><i class="ti ti-users fs-8"> Data Users</i></a></p>
                    </div>
                  </div>
                </div>

              </div>


              <h5 class="card-title fw-semibold mb-4">Data Pengguna</h5>
              <div class="card mb-0">
                <div class="card-body p-2">
                  <table class="table">
                    <thead>
                      <tr class="table-primary">
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Email</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $p): ?>
                        <tr>
                          <td>
                            <?= $p['nama']; ?>
                          </td>
                          <td>
                            <?= $p['instansi']; ?>
                          </td>
                          <td>
                            <?= $p['email']; ?>
                          </td>
                          <td>
                            <a style="text-decoration: none;" href="editpengguna.php?id=<?= $p['iduser']; ?> ">
                              <i class="ti ti-pencil fs-6"></i>
                            </a>
                            |
                            <a style="text-decoration: none;" href="delete.php?iduser=<?= $p['iduser']; ?>"
                              onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                              <i class="ti ti-trash fs-6"></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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