<?php
require_once 'vendor/autoload.php'; // Lokasi file autoload composer
require_once 'controller/tesController.php';

$idhasil = dekripsi($_GET['idhasil']);

if (isset($_COOKIE['mGpTw'])) {
    $data_hasil = query("SELECT * FROM hasil WHERE idhasil = $idhasil")[0];
    $iduser = $data_hasil['iduser'];
    $data_user = query("SELECT * FROM user WHERE iduser = $iduser")[0];
    
} else {
    $data_hasil = query("SELECT * FROM temporary WHERE id = $idhasil")[0];
}


$waktu_tes = strftime('%H:%M:%S | %d %B %Y', strtotime($data_hasil['tgl']));


$nama_kategori = $data_hasil['hsl_tekanan'];
$kategori = query("SELECT * FROM tingkattekanan_stres WHERE tekanan = '$nama_kategori'")[0];

$idkategori = $kategori['idtekanan'];
$solusi = query("SELECT * FROM solusi WHERE idtekanan = $idkategori");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Masukkan kode HTML dan CSS yang ingin Anda konversi ke PDF
$html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Hasil Tes</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: center;
                    vertical-align: middle;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    p {
                        text-align: justify; 
                        text-indent: 0.5in;
                    }
                    li {
                        text-align: left;
                        padding: 0;
                        padding: 0;
                        margin: 0;
                        left: 0;
                    }
                </style>
            </head>
            <body>
                <h1 style="text-align: center;">HASIL TES</h1>
                <h1 style="text-align: center;">TINGKAT TEKANAN STRES AKADEMIK</h1><br>

                <h4>Rincian Hasil CF : ';
                if (isset($_COOKIE['mGpTw'])) {
                    $html .= $data_user['nama'] . '</h4>';
                }

                $html .= '<table>
                    <tr>
                        <th>Bobot</th>
                        <th>Tingkat Tekanan Stres</th>
                        <th>Waktu</th>
                    </tr>

                    <tr>';
$html .= "<td><b>" . $data_hasil['bobot'] . "</b></td>" .
    "<td><b>" . $data_hasil['hsl_tekanan'] . "</b></td>" .
    "<td>" . $waktu_tes . "</td>";
$html .= '</tr>
                </table><br>

                <h4>Solusi :</h4>
                <ul>';
foreach ($solusi as $s) {
    $html .= "<li>" . $s['solusi'] . "</li>";
}
;
$html .= '</ul></td>
                    </tr>
                </table>

            </body>
            </html>';

$dompdf->loadHtml($html);

// Render HTML ke PDF
$dompdf->render();

// Ambil output PDF
$output = $dompdf->output();

// Konversi output PDF menjadi data URI
$pdfDataUri = 'data:application/pdf;base64,' . base64_encode($output);

// Tampilkan pratinjau PDF di browser
echo '<embed src="' . $pdfDataUri . '" type="application/pdf" width="100%" height="100%">';

?>