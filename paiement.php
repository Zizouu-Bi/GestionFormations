<?php
require 'include/connexion.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    die('Inscription invalide.');
}

$pdo = getConnexion();
$stmt = $pdo->prepare('
    SELECT i.*, f.titre, f.prix 
    FROM inscriptions i 
    JOIN formations f ON i.formation_id = f.id 
    WHERE i.id = ?
');
$stmt->execute([$id]);
$inscription = $stmt->fetch();

if (!$inscription) {
    die('Inscription introuvable.');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de paiement</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .confirmation { border: 2px solid #27ae60; padding: 20px; border-radius: 8px; max-width: 500px; }
        h1 { color: #27ae60; }
        .prix { color: #e67e22; font-size: 1.3em; font-weight: bold; }
    </style>
</head>
<body>
    <div class="confirmation">
        <h1>✓ Inscription confirmée !</h1>
        <p><strong>Nom :</strong> <?= htmlspecialchars($inscription['nom']) ?> <?= htmlspecialchars($inscription['prenom']) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($inscription['email']) ?></p>
        <p><strong>Formation :</strong> <?= htmlspecialchars($inscription['titre']) ?></p>
        <p class="prix">Prix : <?= number_format($inscription['prix'], 2, ',', ' ') ?> DT</p>
        <p>Statut : <em>En attente de paiement</em></p>
    </div>
    <br>
    <a href="formations.php">← Retour aux formations</a>
</body>
</html>