<?php $pageTitle = 'Confirmation'; require 'views/partials/header.php'; ?>

<main>
    <div class="succes-card">
        <div class="succes-icon">🎉</div>
        <h1>Paiement confirmé !</h1>
        <p>Bonjour <strong><?= htmlspecialchars($_SESSION['etudiant_prenom']) ?></strong>,</p>
        <p>Votre inscription à</p>
        <p><strong style="color:#3b82f6"><?= htmlspecialchars($_SESSION['formation_titre']) ?></strong></p>
        <p>est confirmée avec succès !</p>
        <br>
        <a href="index.php?page=cours" class="btn btn-primary">Accéder aux cours →</a>
    </div>
</main>

<?php require 'views/partials/footer.php'; ?>