<?php
require_once '../controller/tesController.php';

$data = query("SELECT * FROM hasil");

$id = dekripsi($_COOKIE['mGpTw']);
$user = query("SELECT * FROM user WHERE iduser = $id")[0];

?>

<!doctype html>
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
              <h5 class="card-title fw-semibold mb-4">Riwayat Tes</h5>
              <div class="card mb-0">
                <div class="card-body p-4">
                  <table class="table">
                    <thead>
                      <tr class="table-primary">
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Tingkat Tekanan Stres</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($data as $h):
                        $waktu = strftime('%H:%M:%S | %d %B %Y', strtotime($h['tgl']));
                        ?>
                        <tr>
                          <?php
                          $iduser = $h['iduser'];
                          $nama = query("SELECT nama FROM user WHERE iduser = $iduser")[0];
                          ?>
                          <td>
                            <?= $nama['nama']; ?>
                          </td>
                          <td>
                            <?= $waktu; ?>
                          </td>
                          <td>
                            <?php
                            $nama_kategori = $h['hsl_tekanan'];
                            $kategori = query("SELECT tekanan FROM tingkattekanan_stres WHERE tekanan = '$nama_kategori'")[0];
                            ?>
                            <?= $kategori['tekanan']; ?>
                          </td>
                          <td>
                            <a class="btn btn-primary" href="../hasil?idhasil=<?= $h['idhasil']; ?>">
                              DETAIL
                            </a>
                          </td>
                        </tr>
                        <?php
                      endforeach;
                      ?>
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