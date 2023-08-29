<?php
require_once 'mainController.php';

function input_solusi($data)
{
    global $conn;

    $kategori = htmlspecialchars($data['idkategori']);
    $solusi = htmlspecialchars($data['solusi']);

    $result = mysqli_query($conn, "SELECT solusi FROM solusi WHERE solusi = '$solusi'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Solusi Sudah Ada Silahkan Pakai Solusi Lain');
        document.location.href='solusi.php';
        </script>";
        exit();
    }

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO solusi VALUES (NULL, '$kategori', '$solusi')");

    return mysqli_affected_rows($conn);
}

function update_solusi($data)
{
    var_dump($data);
    global $conn;

    $idsolusi = htmlspecialchars($data['idsolusi']);
    $solusi = htmlspecialchars($data['solusi']);
    $kategori = $data['kategori'];

    mysqli_query($conn, "UPDATE solusi SET solusi = '$solusi', kategori = '$kategori' WHERE idsolusi = '$idsolusi'");

    return mysqli_affected_rows($conn);
}


function hapus_solusi($idsolusi)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM solusi WHERE idsolusi = $idsolusi");

    return mysqli_affected_rows($conn);
}
?>