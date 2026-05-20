<?php
require_once 'models/Database.php';
require_once 'models/Inscription.php';

$inscription = null;
$erreur = '';
$email_recherche = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_recherche = trim($_POST['email'] ?? '');

    if (empty($email_recherche) || !filter_var($email_recherche, FILTER_VALIDATE_EMAIL)) {
        $erreur = 'Veuillez saisir un email valide.';
    } else {
        $pdo = Database::connect();
        $stmt = $pdo->prepare(
            'SELECT i.*, f.titre AS formation_titre, f.prix, f.duree, f.niveau
             FROM inscriptions i
             JOIN formations f ON i.formation_id = f.id
             WHERE i.email = ?
             ORDER BY i.date_inscription DESC
             LIMIT 1'
        );
        $stmt->execute([$email_recherche]);
        $inscription = $stmt->fetch();

        if (!$inscription) {
            $erreur = 'Aucune inscription trouvée pour cet email.';
        }
    }
}

require 'views/profil.php';
?>