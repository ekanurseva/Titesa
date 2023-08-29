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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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
                            <label for="rolename" class="form-label">13.	Saya  sering gugup dan tertekan ketika melakukan aktivitas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P13" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P13" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P13" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P13" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P13" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>
                          
                          <div class="mb-4">
                            <label for="rolename" class="form-label">14.	Saya sering mengumpat ketika mendapat tugas kuliah yang sulit?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P14" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P14" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P14" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P14" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P14" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>
                          
                          <div class="mb-4">
                            <label for="rolename" class="form-label">15.	Saya sering menyalahkan diri sendiri akibat menundan-nunda tugas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P15" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P15" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P15" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P15" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P15" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>
                          
                          <div class="mb-4">
                            <label for="rolename" class="form-label">16.	Saya menangis dan berteriak Ketika mendapat tugas kuliah?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P16" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P16" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P16" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P16" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P16" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>
                          
                          <div class="mb-4">
                            <label for="rolename" class="form-label">17.	Saya berdiam diri Ketika mendapat tugas perkuliahan? </label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P17" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P17" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P17" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P17" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P17" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">18.	Saya tidak pernah membuat jadwal dan mengabaikan perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P18" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P18" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P18" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P18" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P18" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">19.	Saya merasa jantung berdebar-debar ketika hendak menyelesaikan tugas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P19" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P19" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P19" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P19" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P19" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">20.	Saya sering pusing ketika mengerjakan tugas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P20" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P20" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P20" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P20" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P20" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">21.	Saya sering sakit perut ketika mengerjakan kegiatan perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P21" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P21" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P21" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P21" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P21" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">22.	Saya mengalami kerontokan rambut yang parah ketika mendapat banyak tugas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P22" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P22" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P22" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P22" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P22" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">23.	Saya merasa mual tanpa sebab ketika mengerjakan tugas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P23" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P23" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P23" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P23" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P23" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>

                          <div class="mb-4">
                            <label for="rolename" class="form-label">24.	Timbul jerawat ketika saya mengerjakan tugas perkuliahan?</label>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P24" value="0" required>
                              <label class="form-check-label">Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P24" value="0.2" required>
                              <label class="form-check-label">Hampir Tidak Pernah</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P24" value="0.5" required>
                              <label class="form-check-label">Kadang-kadang</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P24" value="0.8" required>
                              <label class="form-check-label">Cukup Sering</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="P24" value="1" required>
                              <label class="form-check-label">Sangat Sering</label>
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                    </div>
                    <a href="tes.php" class="btn btn-secondary w-100 py-8 fs-4 mb-4 rounded-2"> < Sebelumnya</a>
                    <button type="submit" class="btn btn-lg btn-info mb-5" name="submit">Submit</button>
                  </form>
                  <!-- Daftar Pertanyaan Selesai-->
                          
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center text-black fw-bold lebar">
      <p class="mb-0 fs-3">&copy; <a href="#" target="_blank" class="pe-1 text-primary text-decoration">Maharanigilangpratiwi</a>2023</p>
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
