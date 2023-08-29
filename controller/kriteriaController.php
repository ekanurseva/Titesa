<?php
require_once 'mainController.php';

// Fungsi Kode karakteristik Otomatis
function kode_karakteristik()
{
    global $conn;

    $query = "SELECT * FROM karakteristik";
    $kode = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode = "K1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM karakteristik WHERE kode_karakteristik = 'K{$i}'";
            $result = mysqli_query($conn, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode = "K{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "K{$angka}";
            }
        }
        ;
    }

    return $kode;
}
// Fungsi Kode karakteristik Otomatis Selesai


function inputKriteria($data)
{
    global $conn;

    $kriteria = htmlspecialchars($data['kriteria']);
    $kode = strtolower(stripslashes($data["kode"]));
    $deskripsi = $data['deskripsi'];

    $result = mysqli_query($conn, "SELECT karakteristik FROM karakteristik WHERE karakteristik = '$kriteria'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Kriteria Sudah Ada Silahkan Pakai Kriteria Lain');
        document.location.href='kriteria.php';
        </script>";
        exit();
    }

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO karakteristik VALUES (NULL, '$kode', '$kriteria', '$deskripsi')");

    return mysqli_affected_rows($conn);
}

function update_kriteria($data)
{
    var_dump($data);
    global $conn;

    $idkriteria = htmlspecialchars($data['idkriteria']);
    $kriteria = htmlspecialchars($data['karakteristik']);
    $deskripsi = $data['deskripsi'];

    mysqli_query($conn, "UPDATE karakteristik SET karakteristik = '$kriteria', deskripsi = '$deskripsi' WHERE idkarakteristik = '$idkriteria'");

    return mysqli_affected_rows($conn);
}


function hapus_kriteria($idkriteria)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM karakteristik WHERE idkarakteristik = $idkriteria");

    return mysqli_affected_rows($conn);
}
?>