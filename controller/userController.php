<?php
require_once 'mainController.php';

// Fungsi Registrasi User
function register_user($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $instansi = $data['instansi'];
    $level = "User";

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Dipakai Silahkan Pakai Username Lain');
        document.location.href='registrasi.php';
        </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai');
        document.location.href='registrasi.php';
        </script>";
        exit();
    }


    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);


    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama', '$instansi', '$email', '$level')");

    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi User Selesai

// Fungsi Registrasi Admin
function register_admin($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $instansi = "admin";
    $level = "Admin";

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username Sudah Dipakai!');
            document.location.href='admin.php';
        </script>";
        exit;
    }

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Email Sudah Dipakai!');
            document.location.href='admin.php';
        </script>";
        exit;
    }

    if ($password !== $password2) {
        echo "<script>
            alert('Password Tidak Sesuai!');
            document.location.href='admin.php';
        </script>";
        exit;
    }
    $password = password_hash($password2, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama', '$instansi', '$email', '$level')");

    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi Admin selesai

// Fungsi Edit Data Pengguna
function update($data)
{
    global $conn;
    $iduser = $data['iduser'];
    $oldpassword = $data['oldpassword'];
    $oldusername = $data['oldusername'];
    $oldemail = $data['oldemail'];

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $email = htmlspecialchars($data['email']);
    $level = "Admin";

    if (isset($data['oldlevel'])) {
        $level = $data['oldlevel'];
    } else {
        $level = $data['level'];
    }


    if ($username !== $oldusername) {
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('Username Sudah Ada Silahkan Pakai Username Lain');
            document.location.href='admin.php';
            </script>";
            exit();
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
        alert('Password Tidak Sesuai');
        document.location.href='editpengguna.php';
        </script>";
            exit();
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($email !== $oldemail) {
        $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('Email Sudah Digunakan, Silahkan Pakai Email Lain');
            document.location.href='admin.php';
            </script>";
            exit();
        }
    }

    $query = "UPDATE user SET 
                nama = '$nama',
                username = '$username',
                password = '$password',
                email = '$email',
                level = '$level'
              WHERE iduser = $iduser
            ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
// Fungsi Edit Data Pengguna Selesai

// Fungsi Edit Profil Pengguna
function update_profil($data)
{
    global $conn;
    $iduser = $data['iduser'];
    $oldpassword = $data['oldpassword'];
    $oldusername = $data['oldusername'];
    $oldemail = $data['oldemail'];

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $instansi = $data['instansi'];
    $email = htmlspecialchars($data['email']);


    if ($username !== $oldusername) {
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('Username Sudah Ada Silahkan Pakai Username Lain');
            document.location.href='profil.php';
            </script>";
            exit();
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
        alert('Password Tidak Sesuai');
        document.location.href='profil.php';
        </script>";
            exit();
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($email !== $oldemail) {
        $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
            alert('Email Sudah Ada Silahkan Pakai Email Lain');
            document.location.href='profil.php';
            </script>";
            exit();
        }
    }

    $query = "UPDATE user SET 
                username = '$username',
                password = '$password',
                nama = '$nama',
                email = '$email',
                instansi = '$instansi'
              WHERE iduser = $iduser
            ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
// Fungsi Edit Profil Pengguna Selesai

// Delete User
function hapus_user($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE iduser = $id");

    return mysqli_affected_rows($conn);
}
// Delete User Selesai

?>