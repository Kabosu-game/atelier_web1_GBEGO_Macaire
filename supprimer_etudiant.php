<?php
require_once __DIR__ . '/config.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    if ($id > 0) {
        $sql = "DELETE FROM etudiants WHERE id = $id";
        mysqli_query($conn, $sql);
    }
}

header('Location: index.html');
exit;
