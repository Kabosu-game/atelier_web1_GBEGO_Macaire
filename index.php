<?php
require_once __DIR__ . '/config.php';

$sql = "SELECT id, nom, email, telephone FROM contacts ORDER BY nom";
$result = mysqli_query($conn, $sql);
$contacts = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contacts[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Contacts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="card">
            <div class="card-header">
                <div class="title-block">
                    <h1>Carnet de Contacts</h1>
                </div>
                <a href="form.php">
                    <button type="button">
                        <span class="icon">+</span>
                        Ajouter un contact
                    </button>
                </a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($contacts)): ?>
                        <tr>
                            <td colspan="4" class="empty-state">
                                Aucun contact
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($contact['nom'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($contact['telephone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class="td-action">
                                    <a href="supprimer_contact.php?id=<?php echo (int)$contact['id']; ?>" class="btn-del" onclick="return confirm('Supprimer ce contact ?');">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
</html>

