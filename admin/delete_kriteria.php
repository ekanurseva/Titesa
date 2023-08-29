<?php
require_once '../controller/kriteriaController.php';
if (isset($_GET['id'])) {
    $iddiagnosa = $_GET['id'];

    if (hapus_kriteria($iddiagnosa) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='kriteria.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='kriteria.php';
                </script>
            ";
    }
} elseif (isset($_GET['idsolusi'])) {
    $id_solusi = $_GET['idsolusi'];

    if (hapus_solusi($id_solusi) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='solusi.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='solusi.php';
                </script>
            ";
    }
}
?>