<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
    $filiere = isset($_POST['filiere']) ? trim($_POST['filiere']) : '';

    if ($nom !== '' && $prenom !== '' && $email !== '' && $telephone !== '' && $filiere !== '') {
        $nom = mysqli_real_escape_string($conn, $nom);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        $email = mysqli_real_escape_string($conn, $email);
        $telephone = mysqli_real_escape_string($conn, $telephone);
        $filiere = mysqli_real_escape_string($conn, $filiere);

        $sql = "INSERT INTO etudiants (nom, prenom, email, telephone, filiere) VALUES ('$nom', '$prenom', '$email', '$telephone', '$filiere')";
        mysqli_query($conn, $sql);

        header('Location: index.html');
        exit;
    }
}

header('Location: form.html');
exit;
