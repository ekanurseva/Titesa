<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPATITESA</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/Logo4.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
        #background-container {
            background-color: #ffff; /* Warna latar belakang container */
            display: flex;
            align-items: center;
            text-align: center;
            
            justify-content: center;
            height: 100vh; /* Tinggi container sesuai tinggi viewport */
        }

        #dashboard-image {
            max-width: 100%; /* Maksimum lebar gambar adalah lebar container */
            max-height: 80vh; /* Maksimum tinggi gambar agar tidak terlalu besar */
        }
        </style>
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
        <div style="width: 100%;" class="content text-center">
          <h1 style="margin-top: 25px;  color: #5d87ff; padding: 30px 35px"> Welcome to Sistem Pakar Identifikasi Tingkat Tekanan Stres Akademik Pada Mahasiswa </h1>
          <div class="container mt-3">
            <div class="container-fluid" id="background-container">
                <div class="container mt-3">
                  <img src="../assets/images/logos/Logo4.png" alt="" class="img-fluid" id="dashboard-image">
                  <!-- Konten lain di dalam container -->
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
      <script src="../assets/js/sidebarmenu.js"></script>
      <script src="../assets/js/app.min.js"></script>
      <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
      <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
      <script src="../assets/js/dashboard.js"></script>
</body>

</html>