<?php
require_once '../controller/userController.php';
// validasi_admin();
if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    if (hapus_user($id) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='manajpengguna.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='manajpengguna.php';
                </script>
            ";
    }
} elseif (isset($_GET['idhasil'])) {
    $id_hasil = $_GET['idhasil'];

    if (hapus_hasil($id_hasil) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='riwayat.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='riwayat.php';
                </script>
            ";
    }
}
?>