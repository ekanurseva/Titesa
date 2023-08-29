<?php
require_once 'mainController.php';

// Fungsi Kode Indikator Otomatis
function kode_indikator()
{
    global $conn;

    $query = "SELECT * FROM indikator";
    $kode = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode = "I1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM indikator WHERE kode_indikator = 'I{$i}'";
            $result = mysqli_query($conn, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode = "I{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "I{$angka}";
            }
        }
        ;
    }

    return $kode;
}
// Fungsi Kode Indikator Otomatis Selesai


function input_indikator($data)
{
    global $conn;

    $kriteria = htmlspecialchars($data['kriteria']);
    $indikator = htmlspecialchars($data['indikator']);
    $kode = strtolower(stripslashes($data["kode"]));

    $result = mysqli_query($conn, "SELECT indikator FROM indikator WHERE indikator = '$indikator'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Indikator Sudah Ada Silahkan Pakai Indikator Lain');
        document.location.href='indikator.php';
        </script>";
        exit();
    }

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO indikator VALUES (NULL, '$kriteria', '$kode', '$indikator')");

    return mysqli_affected_rows($conn);
}

function update_indikator($data)
{
    global $conn;

    $idkriteria = $data['kriteria'];
    $idindikator = htmlspecialchars($data['idindikator']);
    $indikator = htmlspecialchars($data['indikator']);

    mysqli_query($conn, "UPDATE indikator SET idkarakteristik = '$idkriteria', indikator = '$indikator' WHERE idindikator = '$idindikator'");

    return mysqli_affected_rows($conn);
}


function hapus_indikator($idindikator)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM indikator WHERE idindikator = $idindikator");

    return mysqli_affected_rows($conn);
}
?>