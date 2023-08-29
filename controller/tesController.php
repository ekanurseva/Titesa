<?php
require_once 'mainController.php';

// Fungsi Kode Pertanyaan Otomatis
function kode_pertanyaan()
{
    global $conn;

    $query = "SELECT * FROM pertanyaan";
    $kode = "";

    $jumlah = jumlah_data($query);

    if ($jumlah == 0) {
        $kode = "G1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $query1 = "SELECT COUNT(*) as total FROM pertanyaan WHERE kode_pertanyaan = 'G{$i}'";
            $result = mysqli_query($conn, $query1);
            $row = mysqli_fetch_assoc($result);
            $totalP = $row['total'];

            if ($totalP == 0) {
                $kode = "G{$i}";
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "G{$angka}";
            }
        }
        ;
    }

    return $kode;
}
// Fungsi Kode Pertanyaan Otomatis Selesai


function input_pertanyaan($data)
{
    global $conn;

    $indikator = htmlspecialchars($data['indikator']);
    $pertanyaan = htmlspecialchars($data['pertanyaan']);
    $kode = strtolower(stripslashes($data["kode"]));
    $bobot = $data['bobot'];

    $result = mysqli_query($conn, "SELECT pertanyaan FROM pertanyaan WHERE pertanyaan = '$pertanyaan'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Soal Sudah Ada Silahkan Pakai Soal Lain');
        document.location.href='manajtes.php';
        </script>";
        exit();
    }

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO pertanyaan VALUES (NULL, '$indikator', '$kode', '$pertanyaan', '$bobot')");

    return mysqli_affected_rows($conn);
}

function update_pertanyaan($data)
{
    global $conn;

    $idindikator = $data['idindikator'];
    $idpertanyaan = htmlspecialchars($data['idpertanyaan']);
    $pertanyaan = htmlspecialchars($data['pertanyaan']);
    $bobot = htmlspecialchars($data['bobot']);

    mysqli_query($conn, "UPDATE pertanyaan SET idindikator = '$idindikator', pertanyaan = '$pertanyaan', bobot = '$bobot' WHERE idpertanyaan = '$idpertanyaan'");

    return mysqli_affected_rows($conn);
}


function hapus_soal($idsoal)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pertanyaan WHERE idpertanyaan = $idsoal");

    return mysqli_affected_rows($conn);
}

function input_jawaban($data)
{
    global $conn;

    $jawaban = htmlspecialchars($data['jawaban']);
    $kode = strtolower(stripslashes($data["kode"]));
    $bobot = $data['bobot'];

    $result = mysqli_query($conn, "SELECT jawaban FROM jawaban WHERE jawaban = '$jawaban'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Jawaban Sudah Ada Silahkan Pakai Jawaban Lain');
        document.location.href='jawaban.php';
        </script>";
        exit();
    }

    $result = mysqli_query($conn, "SELECT kode_jawaban FROM jawaban WHERE kode_jawaban = '$kode'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Kode Sudah Ada Silahkan Pakai Kode Lain');
        document.location.href='jawaban.php';
        </script>";
        exit();
    }

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO jawaban VALUES (NULL, '$kode', '$jawaban', '$bobot')");

    return mysqli_affected_rows($conn);
}

function update_jawaban($data)
{
    global $conn;

    $idjawaban = htmlspecialchars($data['idjawaban']);
    $jawaban = htmlspecialchars($data['jawaban']);
    $kode = htmlspecialchars($data['kode']);
    $bobot = htmlspecialchars($data['bobot']);

    mysqli_query($conn, "UPDATE jawaban SET idjawaban = '$idjawaban', kode_jawaban = '$kode', jawaban = '$jawaban', bobot = '$bobot' WHERE idjawaban = '$idjawaban'");

    return mysqli_affected_rows($conn);
}


function hapus_jawaban($idjawaban)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM jawaban WHERE idjawaban = $idjawaban");

    return mysqli_affected_rows($conn);
}

function hitung($data)
{
    global $conn;
    $data_kategori = query("SELECT * FROM tingkattekanan_stres");
    $data_karakteristik = query("SELECT * FROM karakteristik");
    $pertanyaan = query("SELECT * FROM pertanyaan");

    // Ambil CF User
    $nilai_user = array();
    $nama_pertanyaan = array();

    foreach ($pertanyaan as $pertanyaan) {
        $parameter = $pertanyaan['kode_pertanyaan'];
        $nama_pertanyaan[] = $parameter;

        $jawaban = $data[$parameter];
        $nilai = query("SELECT bobot FROM jawaban WHERE kode_jawaban = '$jawaban'")[0];
        $nilai_user[] = $nilai['bobot'];
    }

    $bayes_terbesar = array();

    foreach ($data_karakteristik as $krit) {
        $nama_karakteristik[] = $krit['karakteristik'];
        $kode_karakteristik = $krit['kode_karakteristik'];
        ${"sigma_" . $kode_karakteristik} = 0;
        ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} = 0;

        $idkarakteristik = $krit['idkarakteristik'];

        $data_indikator = query("SELECT * FROM indikator WHERE idkarakteristik = $idkarakteristik");

        foreach ($data_indikator as $di) {
            $idindikator = $di['idindikator'];

            $data_pertanyaan = query("SELECT * FROM pertanyaan WHERE idindikator = $idindikator");

            foreach ($data_pertanyaan as $dp) {
                ${"sigma_" . $kode_karakteristik} += $dp['bobot'];
            }

            foreach ($data_pertanyaan as $dape) {
                ${"h_" . $dape['kode_pertanyaan']} = (${"sigma_" . $kode_karakteristik} == 0) ? 0 : $dape['bobot'] / ${"sigma_" . $kode_karakteristik};

                $kata2 = $dape['kode_pertanyaan'];
                $indeks2 = array_search($kata2, $nama_pertanyaan);

                $hitung2 = $nilai_user[$indeks2] * ${"h_" . $dape['kode_pertanyaan']};
                ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} += $hitung2;
            }

            ${"bayes_" . $kode_karakteristik} = 0;
            foreach ($data_pertanyaan as $dapert) {
                $kata3 = $dapert['kode_pertanyaan'];
                $indeks3 = array_search($kata3, $nama_pertanyaan);

                $hitung3 = $nilai_user[$indeks3] * ${"h_" . $dapert['kode_pertanyaan']};
                ${"p_h_e_" . $dapert['kode_pertanyaan']} = (${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} == 0) ? 0 : $hitung3 / ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik};

                ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']} = ${"p_h_e_" . $dapert['kode_pertanyaan']} * $dapert['bobot'];

                ${"bayes_" . $kode_karakteristik} += ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']};
            }

            ${"hd_" . $kode_karakteristik} = number_format(${"bayes_" . $kode_karakteristik} * 100, 2);

            // echo "Hasil Perhitungan Bayes dari " . $krit['kode_karakteristik'] . " adalah " . ${"hd_" . $krit['kode_karakteristik']} . "<br><br>";

            $bayes_terbesar[] = ${"hd_" . $kode_karakteristik};
        }
    }

    $cf_besar = max($bayes_terbesar);

    // echo "Hasil BAYES TERGEDE adalah " . $cf_besar;

    // Total Bobot untuk kategori
    $cf_total = 0;

    for ($s = 0; $s < count($bayes_terbesar); $s++) {
        $cf_total += $bayes_terbesar[$s];
    }

    // echo "bobot kategori adalah = " . $cf_total . "<br>";

    $kategori_terpilih = '';

    // Memeriksa nilai total pada setiap kategori
    foreach ($data_kategori as $kategori) {
        if ($cf_total >= $kategori['range_bawah'] && $cf_total <= $kategori['range_atas']) {
            $kategori_terpilih = $kategori['tekanan'];
            break; // Hentikan perulangan jika kategori ditemukan
        }
    }

    // var_dump($kategori_terpilih);
    // echo "Kategorinya adalah " . $kategori_terpilih;

    $iduser = dekripsi($_COOKIE['mGpTw']);

    $query = "INSERT INTO hasil
                    VALUES
                    (NULL, '$iduser', '$kategori_terpilih', '$cf_besar', CURRENT_TIMESTAMP())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hitung_guest($data)
{
    global $conn;
    $data_kategori = query("SELECT * FROM tingkattekanan_stres");
    $data_karakteristik = query("SELECT * FROM karakteristik");
    $pertanyaan = query("SELECT * FROM pertanyaan");

    // Ambil CF User
    $nilai_user = array();
    $nama_pertanyaan = array();

    foreach ($pertanyaan as $pertanyaan) {
        $parameter = $pertanyaan['kode_pertanyaan'];
        $nama_pertanyaan[] = $parameter;

        $jawaban = $data[$parameter];
        $nilai = query("SELECT bobot FROM jawaban WHERE kode_jawaban = '$jawaban'")[0];
        $nilai_user[] = $nilai['bobot'];
    }

    $bayes_terbesar = array();

    foreach ($data_karakteristik as $krit) {
        $nama_karakteristik[] = $krit['karakteristik'];
        $kode_karakteristik = $krit['kode_karakteristik'];
        ${"sigma_" . $kode_karakteristik} = 0;
        ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} = 0;

        $idkarakteristik = $krit['idkarakteristik'];

        $data_indikator = query("SELECT * FROM indikator WHERE idkarakteristik = $idkarakteristik");

        foreach ($data_indikator as $di) {
            $idindikator = $di['idindikator'];

            $data_pertanyaan = query("SELECT * FROM pertanyaan WHERE idindikator = $idindikator");

            foreach ($data_pertanyaan as $dp) {
                ${"sigma_" . $kode_karakteristik} += $dp['bobot'];
            }

            foreach ($data_pertanyaan as $dape) {
                ${"h_" . $dape['kode_pertanyaan']} = (${"sigma_" . $kode_karakteristik} == 0) ? 0 : $dape['bobot'] / ${"sigma_" . $kode_karakteristik};

                $kata2 = $dape['kode_pertanyaan'];
                $indeks2 = array_search($kata2, $nama_pertanyaan);

                $hitung2 = $nilai_user[$indeks2] * ${"h_" . $dape['kode_pertanyaan']};
                ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} += $hitung2;
            }

            ${"bayes_" . $kode_karakteristik} = 0;
            foreach ($data_pertanyaan as $dapert) {
                $kata3 = $dapert['kode_pertanyaan'];
                $indeks3 = array_search($kata3, $nama_pertanyaan);

                $hitung3 = $nilai_user[$indeks3] * ${"h_" . $dapert['kode_pertanyaan']};
                ${"p_h_e_" . $dapert['kode_pertanyaan']} = (${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} == 0) ? 0 : $hitung3 / ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik};

                ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']} = ${"p_h_e_" . $dapert['kode_pertanyaan']} * $dapert['bobot'];

                ${"bayes_" . $kode_karakteristik} += ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']};
            }

            ${"hd_" . $kode_karakteristik} = number_format(${"bayes_" . $kode_karakteristik} * 100, 2);

            // echo "Hasil Perhitungan Bayes dari " . $krit['kode_karakteristik'] . " adalah " . ${"hd_" . $krit['kode_karakteristik']} . "<br><br>";

            $bayes_terbesar[] = ${"hd_" . $kode_karakteristik};
        }
    }

    $cf_besar = max($bayes_terbesar);

    // echo "Hasil BAYES TERGEDE adalah " . $cf_besar;

    // Total Bobot untuk kategori
    $cf_total = 0;

    for ($s = 0; $s < count($bayes_terbesar); $s++) {
        $cf_total += $bayes_terbesar[$s];
    }

    // echo "bobot kategori adalah = " . $cf_total . "<br>";

    $kategori_terpilih = '';

    // Memeriksa nilai total pada setiap kategori
    foreach ($data_kategori as $kategori) {
        if ($cf_total >= $kategori['range_bawah'] && $cf_total <= $kategori['range_atas']) {
            $kategori_terpilih = $kategori['tekanan'];
            break; // Hentikan perulangan jika kategori ditemukan
        }
    }

    $_SESSION['hasil_perhitungan'] = array(
        'cf_besar' => $cf_besar,
        'kategori_terpilih' => $kategori_terpilih
    );
}

function create_kategori()
{
    global $conn;
    $data_kategori = query("SELECT * FROM tingkattekanan_stres");
    $data_karakteristik = query("SELECT * FROM karakteristik");
    $pertanyaan = query("SELECT DISTINCT kode_pertanyaan FROM pertanyaan");

    foreach ($data_kategori as $kategori) {
        $nama_kategori[] = $kategori['tekanan'];
    }

    // Ambil CF User
    $nilai_user = 1;

    foreach ($pertanyaan as $ind) {
        $parameter = $ind['kode_pertanyaan'];
        $nama_pertanyaan[] = $parameter;
    }

    $bayes_terbesar = array();

    foreach ($data_karakteristik as $krit) {
        $nama_karakteristik[] = $krit['karakteristik'];
        $kode_karakteristik = $krit['kode_karakteristik'];
        ${"sigma_" . $kode_karakteristik} = 0;
        ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} = 0;

        $idkarakteristik = $krit['idkarakteristik'];

        $data_indikator = query("SELECT * FROM indikator WHERE idkarakteristik = $idkarakteristik");

        foreach ($data_indikator as $di) {
            $idindikator = $di['idindikator'];

            $data_pertanyaan = query("SELECT * FROM pertanyaan WHERE idindikator = $idindikator");

            foreach ($data_pertanyaan as $dp) {
                ${"sigma_" . $kode_karakteristik} += $dp['bobot'];
            }

            foreach ($data_pertanyaan as $dape) {
                ${"h_" . $dape['kode_pertanyaan']} = (${"sigma_" . $kode_karakteristik} == 0) ? 0 : $dape['bobot'] / ${"sigma_" . $kode_karakteristik};

                $kata2 = $dape['kode_pertanyaan'];
                $indeks2 = array_search($kata2, $nama_pertanyaan);

                $hitung2 = $nilai_user * ${"h_" . $dape['kode_pertanyaan']};
                ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} += $hitung2;
            }

            ${"bayes_" . $kode_karakteristik} = 0;
            foreach ($data_pertanyaan as $dapert) {
                $kata3 = $dapert['kode_pertanyaan'];
                $indeks3 = array_search($kata3, $nama_pertanyaan);

                $hitung3 = $nilai_user * ${"h_" . $dapert['kode_pertanyaan']};
                ${"p_h_e_" . $dapert['kode_pertanyaan']} = (${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik} == 0) ? 0 : $hitung3 / ${"p_h_" . $kode_karakteristik . "xh_" . $kode_karakteristik};

                ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']} = ${"p_h_e_" . $dapert['kode_pertanyaan']} * $dapert['bobot'];

                ${"bayes_" . $kode_karakteristik} += ${"bayes_" . $kode_karakteristik . $dapert['kode_pertanyaan']};
            }

            ${"hd_" . $kode_karakteristik} = number_format(${"bayes_" . $kode_karakteristik} * 100, 2);

            // echo "Hasil Perhitungan Bayes dari " . $krit['kode_karakteristik'] . " adalah " . ${"hd_" . $krit['kode_karakteristik']} . "<br><br>";

            $bayes_terbesar[] = ${"hd_" . $kode_karakteristik};
        }
    }

    // Total Bobot untuk kategori
    $cf_total = 0;

    for ($s = 0; $s < count($bayes_terbesar); $s++) {
        $cf_total += $bayes_terbesar[$s];
    }
    // echo "Total nilai kategorinya adalah " . $cf_total . "<br>";

    $nilai_bawah = -0.001;
    $pembagi = count($nama_kategori);
    for ($f = 0; $f < count($nama_kategori); $f++) {
        $range_bawah = number_format($nilai_bawah + 0.001, 3);
        $atas = $f + 1;
        $nam_kat = $nama_kategori[$f];
        $range_atas = number_format($cf_total * $atas / $pembagi, 3);

        $nilai_bawah = $range_atas;

        $query = "UPDATE tingkattekanan_stres SET 
                        range_atas = '$range_atas',
                        range_bawah = '$range_bawah'
                    WHERE tekanan = '$nam_kat'
                    ";
        mysqli_query($conn, $query);
    }
}

?>