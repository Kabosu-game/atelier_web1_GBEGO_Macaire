<?php

$db_host = 'localhost';
$db_name = 'contacts_db';
$db_user = 'root';
$db_pass = '';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
