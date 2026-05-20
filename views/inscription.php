<?php $pageTitle = 'Inscription'; require 'views/partials/header.php'; ?>

<main class="form-section">
    <h1>Formulaire d'Inscription</h1>

    <?php if (!empty($erreurs)): ?>
        <div class="alert alert-error">
            <strong>Erreurs détectées :</strong>
            <ul>
                <?php foreach ($erreurs as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=inscription">
        <label>Nom *</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" required>

        <label>Prénom *</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>" required>

        <label>Email *</label>
        <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

        <label>Formation choisie *</label>
        <select name="formation_id" required>
            <option value="">-- Choisir une formation --</option>
            <?php foreach ($formations as $f): ?>
                <option value="<?= $f['id'] ?>" <?= ($formation_preselect == $f['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($f['titre']) ?> – <?= $f['prix'] ?> DT
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary">Continuer vers le paiement →</button>
    </form>
</main>

<?php require 'views/partials/footer.php'; ?>