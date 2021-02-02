<?php
require_once 'connection.php';
$id = $_POST['id_user'];
$namaDepan = $_POST['nama_depan'];
$namaBelakang = $_POST['nama_belakang'];
$email = $_POST['email'];
$currentPassword = $_POST['current_password'];
$password = $_POST['password'];
$newPassword = $_POST['new_password'];
$username = $_POST['username'];
$usia = $_POST['usia'];
$alamat = $_POST['alamat'];
$kotaLahir = $_POST['kota_lahir'];
$namaFile = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];

if (isset($_POST['new_password'])) {
    try {
        if ($newPassword != '' || $newPassword != null) {
            if ($currentPassword == sha1($password)) {
                $qChangePassword = $conn->prepare("UPDATE `users` SET `password`= SHA1(?) WHERE `id_user` = ?");
                $qChangePassword->execute([$newPassword, $id]);
                echo "<script>
                alert('Profile telah berubah');
                window.location.replace('../home.php');
                </script>";
            } else {
                echo "<script>
            alert('Password tidak sama dengan password sebelumnya');
            window.location.replace('../biodata.php');
            </script>";
            }
        } else {
            echo "<script>
            alert('Profile telah berubah');
            window.location.replace('../home.php');
            </script>";
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
}
try {
    if ($namaFile == '') {
        $q = $conn->prepare(
            "UPDATE `users` SET `nama_depan`=?,`nama_belakang`=?,`username`=? WHERE `id_user` = ?;
            UPDATE `biodata` SET `usia`=?,`alamat`=?,`kota_lahir`=? WHERE `id_user` = ?"
        );
        $q->execute([$namaDepan, $namaBelakang, $username, $id, $usia, $alamat, $kotaLahir, $id]);
    } else {
        $getOldImage = $conn->prepare("SELECT `photo` FROM `biodata` WHERE `id_user` = ?");
        $getOldImage->execute([$id]);
        foreach ($getOldImage as $x) {
            $foto = $x['photo'];
        }
        if ($foto != null) {
            unlink('../' . $foto);
        }
        $q = $conn->prepare(
            "UPDATE `users` SET `nama_depan`=?,`nama_belakang`=?,`username`=? WHERE `id_user` = ?;
            UPDATE `biodata` SET `usia`=?,`alamat`=?,`kota_lahir`=?,`photo`=? WHERE `id_user` = ?"
        );
        $q->execute([$namaDepan, $namaBelakang, $username, $id, $usia, $alamat, $kotaLahir, 'images/' . $id . '-' . $namaFile, $id]);
        move_uploaded_file($tmpName, '../images/' . $id . '-' . $namaFile);
    }
} catch (PDOException $err) {
    echo $err->getMessage();
}
