<?php
require_once 'connection.php';
$sessionEmail = $_SESSION['email'];
try {
    $sql = "SELECT u.id_user,u.email,u.username,b.photo  
    FROM `users` u
    JOIN `biodata` b
    WHERE `email` LIKE ? AND u.id_user = b.id_user";
    $qUsers = $conn->prepare($sql);
    $qUsers->execute([$sessionEmail]);
} catch (PDOException $err) {
    die($err->getMessage());
}
