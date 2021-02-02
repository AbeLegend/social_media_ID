<?php
require_once 'connection.php';

$idUser = $_POST["id_user"];
$idPost = $_POST["id_post"];


if (isset($_POST['like'])) {
    try {
        $qUser = $conn->prepare("INSERT INTO `like_post` (`id_post`, `id_user`, `suka`) VALUES (?, ?,'like')");
        $qUser->execute([$idPost, $idUser]);
        header("Location: ../home.php");
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
if (isset($_POST['unlike'])) {
    try {
        $qUser = $conn->prepare("INSERT INTO `like_post` (`id_post`, `id_user`, `suka`) VALUES (?, ?,'not')");
        $qUser->execute([$idPost, $idUser]);
        header("Location: ../home.php");
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
