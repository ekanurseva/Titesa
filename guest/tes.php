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
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php" class="text-nowrap logo-img">
            <h1 class="fw-bold text-primary m-0">SIPA<span class="text-secondary">TITESA</span></h1>
            <!-- <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" /> -->
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Dashboard</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./tes.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Tes</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Autentikasi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../user/login.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../user/registrasi.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registrasi</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access-img">
            <img src="../assets/images/backgrounds/meditasi.png" alt="" class="img-fluid">
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
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

            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->


      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <section class="pt-1 text-center container">
              <div class="row pt-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                  <a href="" class="text-nowrap logo-img text-center d-block py-2 w-100">
                    <img src="../assets/images/logos/Logo4.png" width="50" alt="" />
                  </a>
                  <h3 class="fw-bold">Tes Tingkat Tekanan Stres Akademik</h3>
                  <p class="lead">Jawablah pertanyaan dibawah ini !</p>
                  <br>
                  <br>
                </div>
              </div>
            </section>
            <!-- Daftar Pertanyaan -->
            <form action="" method="post">
              <input type="hidden" name="nama" value="">
              <input type="hidden" name="instansi" value="">


              <div class="container">
                <div class="row">
                  <div class="col-md mt-3">
                    <div class="mb-4">
                      <label for="rolename" class="form-label">1. Saya tidak percaya diri ketika menyelesaikan tugas
                        perkuliahan?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P1" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P1" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P1" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P1" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P1" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">2. Saya sering ingin menyerah untuk tidak melanjutkan
                        perkuliahan?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P2" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P2" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P2" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P2" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P2" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">3. Saya berfikir tugas perkuliahan susah dan tidak dapat
                        di selesaikan?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P3" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P3" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P3" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P3" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P3" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">4. Saya berfikir mengerjakan tugas kuliah itu
                        sia-sia?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P4" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P4" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P4" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P4" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P4" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">5. Saya berfikir bahwa tidak memiliki teman yang dapat
                        membantu aktivitas perkulihan?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P5" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P5" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P5" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P5" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P5" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">6. Saya berfikir akan gagal dalam menyelesaikan
                        perkuliahan dan mengecewakan semua orang?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P6" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P6" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P6" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P6" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P6" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">7. Saya sering kesal karena mendapat tugas dari
                        dosen?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P7" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P7" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P7" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P7" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P7" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">8. Saya sering merasa cemas ketika tidak dapat
                        menyelesaikan tugas kuliah?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P8" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P8" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P8" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P8" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P8" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">9. Saya sering merasakan sedih ketika mendapat nilai MK
                        rendah?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P9" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P9" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P9" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P9" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P9" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">10. Saya mengalami emosi yang tidak stabil (kadang
                        marah,kadang bersemangat) pada saat menjalani perkuliahan ?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P10" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P10" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P10" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P10" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P10" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">11. Saya sering merasa capek dan jenuh saat melakukan
                        aktivitas perkuliahan?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P11" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P11" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P11" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P11" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P11" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="rolename" class="form-label">12. Saya sering merasa tidak berdaya ketika sedang
                        menyelesaikan tugas kuliah?</label>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P12" value="0" required>
                        <label class="form-check-label">Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P12" value="0.2" required>
                        <label class="form-check-label">Hampir Tidak Pernah</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P12" value="0.5" required>
                        <label class="form-check-label">Kadang-kadang</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P12" value="0.8" required>
                        <label class="form-check-label">Cukup Sering</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="P12" value="1" required>
                        <label class="form-check-label">Sangat Sering</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <a href="tes2.php" class="btn btn-secondary w-100 py-8 fs-4 mb-4 rounded-2">Selanjutnya > </a>

          </form>
          <!-- Daftar Pertanyaan Selesai-->

        </div>
      </div>
    </div>
  </div>
  </div>
  <footer class="text-center text-black fw-bold lebar">
    <p class="mb-0 fs-3">&copy; <a href="#" target="_blank"
        class="pe-1 text-primary text-decoration">Maharanigilangpratiwi</a>2023</p>
  </footer>

  <script>

  </script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>