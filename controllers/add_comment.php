<?php
require_once 'connection.php';
$idPost = $_POST["id_post"];
$idUser = $_POST["id_user"];
$komen = $_POST["komen"];


if (isset($_POST['add_comment'])) {
    try {
        $qUser = $conn->prepare("INSERT INTO `komentar_post` (`id_post`, `id_user`, `komentar`) VALUES (?, ?, ?)");
        $qUser->execute([$idPost, $idUser, $komen]);
        header("Location: ../home.php");
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
