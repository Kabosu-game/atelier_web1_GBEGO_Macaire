<?php
require_once __DIR__ . '/config.php';

$etudiant = null;
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    $sql = "SELECT id, nom, prenom, email, telephone, filiere FROM etudiants WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $etudiant = mysqli_fetch_assoc($result);
    }
}

if (!$etudiant) {
    header('Location: index.html');
    exit;
}

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

        $sql = "UPDATE etudiants SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', filiere = '$filiere' WHERE id = $id";
        mysqli_query($conn, $sql);

        header('Location: index.html');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="page">
        <section class="card">
            <h1 class="card_title">Modifier l'étudiant</h1>
            <form class="form" action="modifier_etudiant.php?id=<?php echo (int)$etudiant['id']; ?>" method="POST">
                <div class="form_group">
                    <label class="form_label" for="nom">Nom</label>
                    <input class="form_input" type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form_group">
                    <label class="form_label" for="prenom">Prénom</label>
                    <input class="form_input" type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form_group">
                    <label class="form_label" for="email">Email</label>
                    <input class="form_input" type="email" id="email" name="email" value="<?php echo htmlspecialchars($etudiant['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form_group">
                    <label class="form_label" for="telephone">Téléphone</label>
                    <input class="form_input" type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($etudiant['telephone'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form_group">
                    <label class="form_label" for="filiere">Filière</label>
                    <input class="form_input" type="text" id="filiere" name="filiere" value="<?php echo htmlspecialchars($etudiant['filiere'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form_actions">
                    <a href="index.html" class="btn-cancel">Annuler</a>
                    <button class="button" type="submit">Enregistrer</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
