<?php
require_once __DIR__ . '/config.php';

$sql = "SELECT id, nom, prenom, email, telephone, filiere FROM etudiants ORDER BY nom, prenom";
$result = mysqli_query($conn, $sql);
$etudiants = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $etudiants[] = $row;
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($etudiants);
