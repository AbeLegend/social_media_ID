<?php
$database_hostname = 'localhost';
$database_username = 'id16063954_root';
$database_password = 'kSK8PH|MTk?*\Qi@';
$database_name     = 'id16063954_social_media_id';

try {
    $conn = new PDO(
        "mysql:host=$database_hostname;dbname=$database_name",
        $database_username,
        $database_password
    );
} catch (PDOException $err) {
    die($err->getMessage());
}
