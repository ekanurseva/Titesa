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
            <h1 class="card-title fw-semibold mb-4">Gejala</h1>
            <div class="container mt-3">
              <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#myModal">
                + Input Gejala
              </button>
            </div>

            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Input Gejala</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Pilih Kriteria</option>
                      <option value="K1"> (K1) Pikiran</option>
                      <option value="K2"> (K2) Emosi</option>
                      <option value="K3"> (K3) Perilaku</option>
                      <option value="K4"> (K4) Fisik</option>
                    </select>
                    <br>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Pilih Indikator</option>
                      <option value="I1"> (I1) Penghargaan Atas Diri Rendah</option>
                      <option value="I2"> (I2) Merasa Tidak Dapat Mengendalikan Perasaan</option>
                      <option value="I3"> (I3) Merasa Todak Dapat Mengendalikan Diri</option>
                      <option value="I4"> (I4) Tertekan & Kesulitan</option>
                      <option value="I5"> (I5) Tidak Dapat Mengendalikan Diri & Mengatasi Masalah</option>
                      <option value="I6"> (I6) Gejala Fisik Yang Keluar</option>
                    </select>
                    <br>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Kode Gejala" aria-label="kodegejala">
                      <span class="input-group-text"></span>
                      <input type="text" class="form-control" placeholder="Gejala" aria-label="gejala">
                    </div>

                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button>
                  </div>

                </div>
              </div>
            </div>



            <table class="table">
              <thead>
                <tr class="table-primary">
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Default</td>
                  <td>Defaultson</td>
                  <td>def@somemail.com</td>
                </tr>
              </tbody>
            </table>
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