<?php
require_once "connection.php";
$namaDepan = $_POST["nama_depan"];
$namaBelakang = $_POST["nama_belakang"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$usia = $_POST["usia"];
$alamat = $_POST["alamat"];
$kotaLahir = $_POST["kota_lahir"];


if (isset($_POST['signup'])) {
  try {
    $qUser = $conn->prepare("INSERT INTO users VALUES (NULL, ?, ?, ?, ?, SHA1(?));
    INSERT INTO `biodata` (`id_user`, `usia`, `alamat`, `kota_lahir`) VALUES (LAST_INSERT_ID(), ?, ?, ?)");
    $qUser->execute([$namaDepan, $namaBelakang, $email, $username, $password, $usia, $alamat, $kotaLahir]);
    echo "<script>
            alert('Berhasil, silahkan login');
            window.location.replace('../signin.php');
            </script>";
  } catch (PDOException $err) {
    echo $err->getMessage();
  }
}
