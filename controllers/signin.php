<?php
session_start();
require_once 'connection.php';

if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  try {
    $sqlInsertUser = "SELECT `id_user` FROM `users` WHERE `email` = ? AND `password` = SHA1(?)";
    $q = $conn->prepare($sqlInsertUser);
    $q->execute([$email, $password]);
    foreach ($q as $data) {
      $idUser = $data['id_user'];
    }
    if ($q->rowCount() == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $idUser;
      echo "<script>
      alert('Berhasil Login');
      window.location.replace('../home.php');
      </script>";
      return;
    } else {
      echo "<script>
      alert('Email atau password salah!');
      window.location.replace('../signin.php');
      </script>";
    }
  } catch (PDOException $err) {
    echo $err->getMessage();
  }
}
