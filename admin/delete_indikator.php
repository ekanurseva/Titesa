<?php
require_once '../controller/indikatorController.php';
require_once '../controller/tesController.php';
if (isset($_GET['id'])) {
    $iddiagnosa = $_GET['id'];

    if (hapus_indikator($iddiagnosa) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='indikator.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='indikator.php';
                </script>
            ";
    }
} elseif (isset($_GET['idsoal'])) {
    $id_soal = $_GET['idsoal'];

    if (hapus_soal($id_soal) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='manajtes.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='manajtes.php';
                </script>
            ";
    }
} elseif (isset($_GET['idjawaban'])) {
    $id_jawaban = $_GET['idjawaban'];

    if (hapus_jawaban($id_jawaban) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='jawaban.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='jawaban.php';
                </script>
            ";
    }
}
?>