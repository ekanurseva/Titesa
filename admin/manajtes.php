<?php
require_once '../controller/tesController.php';

$indikator = query("SELECT * FROM indikator");

$kode = kode_pertanyaan();

$soal = query("SELECT * FROM pertanyaan");

if (isset($_POST["submit"])) {
  if (input_pertanyaan($_POST) > 0) {
    create_kategori();
    echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href='manajtes.php';
        </script>
        ";
  } else {
    echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href='manajtes.php';
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
        <div class="card">
          <div class="card-body">
            <h1 class="card-title fw-semibold mb-4">Soal</h1>
            <div class="container mt-3">
              <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#myModal">
                + Input Soal
              </button>
            </div>

            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Input Soal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <form action="" method="post">
                    <!-- Modal body -->
                    <div class="modal-body">
                      <label for="indikator">Indikator</label>
                      <select class="form-select" id="indikator" aria-label="Default select example" name="indikator">
                        <option selected hidden value="">-- Pilih Indikator --</option>
                        <?php foreach ($indikator as $i): ?>
                          <option value="<?= $i['idindikator']; ?>"><?= $i['kode_indikator']; ?>-<?= $i['indikator']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                      <br>
                      <label for="kode">Kode Soal :</label>
                      <input readonly class="form-control mb-3" id="kode" name="kode" value="<?= $kode; ?>">
                      <br>
                      <label for="soal">Soal :</label>
                      <textarea class="form-control" rows="3" id="soal" name="pertanyaan"></textarea>
                      <br>
                      <label for="bobot">Bobot :</label>
                      <input class="form-control" rows="3" id="bobot" type="number" step="0.1" max="1" name="bobot">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary"
                        data-bs-dismiss="modal">Simpan</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>



            <table class="table">
              <thead>
                <tr class="table-primary">
                  <th>Kode Indikator</th>
                  <th>Kode Soal</th>
                  <th>Soal</th>
                  <th>Bobot</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($soal as $s): ?>
                  <tr>
                    <?php
                    $idindikator = $s['idindikator'];
                    $ind = query("SELECT kode_indikator FROM indikator WHERE idindikator = $idindikator")[0];
                    ?>
                    <td>
                      <?= $ind['kode_indikator']; ?>
                    </td>
                    <td>
                      <?= $s['kode_pertanyaan']; ?>
                    </td>
                    <td>
                      <?= $s['pertanyaan']; ?>
                    </td>
                    <td>
                      <?= $s['bobot']; ?>
                    </td>
                    <td>
                      <a style="text-decoration: none;" href="editsoal.php?idsoal=<?= $s['idpertanyaan']; ?>">
                        <i class="ti ti-pencil fs-6"></i>
                      </a>
                      |
                      <a style="text-decoration: none;" href="delete_indikator.php?idsoal=<?= $s['idpertanyaan']; ?>"
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