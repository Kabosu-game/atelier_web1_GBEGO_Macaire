<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <main class="page">
        <section class="card">
            <h1 class="card_title">Formulaire d'ajout de contact</h1>
            <form class="form" action="ajouter_contact.php" method="POST" novalidate>
                <div class="form_group">
                    <label class="form_label" for="nom">Nom</label>
                    <input class="form_input" type="text" id="nom" name="nom" autocomplete="name" required>
                </div>
                <div class="form_group">
                    <label class="form_label" for="email">Email</label>
                    <input class="form_input" type="email" id="email" name="email" autocomplete="email" required>
                </div>
                <div class="form_group">
                    <label class="form_label" for="telephone">Téléphone</label>
                    <input class="form_input" type="tel" id="telephone" name="telephone" autocomplete="tel" required>
                </div>
                <div class="form_actions">
                    <button class="button" type="submit">Enregistrer</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>