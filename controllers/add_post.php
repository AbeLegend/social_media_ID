<?php
require_once 'connection.php';
$id = $_POST["id"];
$post = $_POST["post"];
$tgl = $_POST["tgl_post_dibuat"];
$namaImage = $_FILES['gambar_post']['name'];
$tmpNameImage = $_FILES['gambar_post']['tmp_name'];

if (isset($_POST['posting'])) {
    try {
        if ($namaImage == '') {
            $qUser = $conn->prepare("INSERT INTO `post` (`id_user`, `post`, `tgl_post_dibuat`) VALUES (?, ?, ?);");
            $qUser->execute([$id,  $post, $tgl]);
            header("Location: ../home.php");
        } else {
            $qUser = $conn->prepare("INSERT INTO `post` (`id_user`, `gambar_post`, `post`, `tgl_post_dibuat`) VALUES (?, ?, ?, ?);");
            $qUser->execute([$id, 'images/' . $id . '-' . strtotime($tgl) . '-' . $namaImage, $post, $tgl]);
            move_uploaded_file($tmpNameImage, '../images/' . $id . '-' . strtotime($tgl) . '-' . $namaImage);
            header("Location: ../home.php");
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
