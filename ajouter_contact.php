<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';

    if ($nom !== '' && $email !== '' && $telephone !== '') {
        $nom = mysqli_real_escape_string($conn, $nom);
        $email = mysqli_real_escape_string($conn, $email);
        $telephone = mysqli_real_escape_string($conn, $telephone);

        $sql = "INSERT INTO contacts (nom, email, telephone) VALUES ('$nom', '$email', '$telephone')";
        mysqli_query($conn, $sql);

        header('Location: index.php');
        exit;
    }
}
?>