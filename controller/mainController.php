<?php
// koneksi ke database mysql
$conn = mysqli_connect("localhost", "root", "", "sipatitesa");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan error
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}

// Fungsi query fetch
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Fungsi query fetch selesai

// Fungsi jumlah data dari query yang terbaca
function jumlah_data($data)
{
    global $conn;
    $query = mysqli_query($conn, $data);

    $jumlah_data = mysqli_num_rows($query);

    return $jumlah_data;
}
// Fungsi jumlah data selesai

// Fungsi generateRandomKey
function generateRandomKey()
{
    $keyLength = 32;
    $randomBytes = openssl_random_pseudo_bytes($keyLength, $strong);

    if (!$strong) {
        // Jika openssl_random_pseudo_bytes() tidak menghasilkan kunci yang kuat, Anda bisa menggunakan alternatif lain.
        $randomBytes = random_bytes($keyLength);
    }

    return base64_encode($randomBytes);
}
// Fungsi generateRandomKey selesai

// Fungsi enkripsi
function enkripsi($teks)
{
    $text = $teks;
    $kunci = 'mGpTw';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $enkripsi = openssl_encrypt($text, $method, $key, 0, $iv);
    $enkripsi = base64_encode($enkripsi);

    return $enkripsi;
}
// Fungsi enkripsi selesai

// Fungsi dekripsi
function dekripsi($teks)
{
    $text = $teks;
    $kunci = 'mGpTw';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $dekripsi = base64_decode($text);
    $dekripsi = openssl_decrypt($dekripsi, $method, $key, 0, $iv);

    return $dekripsi;
}
// Fungsi dekripsi

// Fungsi validasi user
function validasi()
{
    global $conn;
    if (!isset($_COOKIE['mGpTw'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['mGpTw']);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE iduser = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}
// Fungsi validasi user selesai

// Fungsi validasi admin
function validasi_admin()
{
    global $conn;
    if (!isset($_COOKIE['mGpTw'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['mGpTw']);

    $cek = query("SELECT * FROM user WHERE iduser = $id")[0];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE iduser = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    } elseif ($cek['level'] !== "Admin") {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}
// Fungsi validasi admin selesai
?>