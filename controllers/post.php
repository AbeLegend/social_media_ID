<?php
require_once 'connection.php';
try {
    $sql = "SELECT u.username, p.id_post,p.id_user, p.post,p.gambar_post,p.tgl_post_dibuat , b.photo
    FROM `post` p  
    JOIN `users` u
    JOIN `biodata` b
    WHERE u.id_user = p.id_user AND u.id_user = b.id_user ORDER BY p.tgl_post_dibuat DESC";
    $qPost = $conn->prepare($sql);
    $qPost->execute();
} catch (PDOException $err) {
    die($err->getMessage());
}
function getJumlahKomen($conn, $idPost)
{

    try {
        $sql = "SELECT COUNT(komentar) AS jumlahKomen FROM komentar_post WHERE `id_post` = ?";
        $q = $conn->prepare($sql);
        $q->execute([$idPost]);
    } catch (PDOException $err) {
        die($err->getMessage());
    }
    foreach ($q as $data) {
        $jumlahKomen = $data['jumlahKomen'];
    }
    return $jumlahKomen;
}
function getJumlahLike($conn, $idPost)
{
    try {
        $sql = "SELECT COUNT(suka) AS jumlahLike FROM like_post WHERE `suka` LIKE 'like' AND `id_post` = ?";
        $q = $conn->prepare($sql);
        $q->execute([$idPost]);
    } catch (PDOException $err) {
        die($err->getMessage());
    }
    foreach ($q as $data) {
        $jumlahLike = $data['jumlahLike'];
    }
    return $jumlahLike;
}

function getJumlahUnlike($conn, $idPost)
{
    try {
        $sql = "SELECT COUNT(suka) AS jumlahUnlike FROM like_post WHERE `suka` LIKE 'not' AND `id_post` =?";
        $q = $conn->prepare($sql);
        $q->execute([$idPost]);
    } catch (PDOException $err) {
        die($err->getMessage());
    }
    foreach ($q as $data) {
        $jumlahUnlike = $data['jumlahUnlike'];
    }
    return $jumlahUnlike;
}
