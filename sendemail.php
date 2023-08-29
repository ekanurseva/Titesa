<?php
require_once 'controller/mainController.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (!mysqli_fetch_assoc($result)) {
        echo "
                <script>
                    alert('Email tidak ditemukan');
                    document.location.href='login.php';
                </script>
                ";
        exit();
    } else {
        $data = query("SELECT email FROM user WHERE email = '$email'")[0];

        $enkripsi_email = enkripsi($data['email']);
    }
} else {
    echo "<script>
                document.location.href='login.php';
              </script>";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'lauranzsiskaly@gmail.com'; //SMTP username
    $mail->Password = 'bezeehtlifzqhzlf'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sipatitesa@gmail.com', 'Sistem Pakar Tingkat Stres Akademin');
    $mail->addAddress($data['email']); //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Ubah Password Sistem Pakar Tingkat Stres Akademik';
    $mail->Body = '<p>Klik link ini untuk ubah password (jangan sampai orang lain tahu link ini).</p><a href="http://localhost/titesa/lupapw.php?key=' . $enkripsi_email . '">Klik ini untuk ubah password</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo "
            <script>
                alert('Berhasil kirim email, silahkan check email');
                document.location.href='login.php';
            </script>
        ";
} catch (Exception $e) {
    echo "
            <script>
                alert('Email gagal dikirim');
               
            </script>
        ";
}

?>