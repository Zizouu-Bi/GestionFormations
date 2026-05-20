<?php
require 'include/connexion.php';
require 'include/validation.php';
require 'include/fonctions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $formation_id = (int)($_POST['formation_id'] ?? 0);

    $erreur = validerFormulaire($nom, $prenom, $email);

    if ($formation_id <= 0) {
        $erreur .= 'Veuillez choisir une formation.<br>';
    }

    if (!empty($erreur)) {
        echo afficherErreur($erreur);
    } else {
        $pdo = getConnexion();
        $stmt = $pdo->prepare(
            'INSERT INTO inscriptions (nom, prenom, email, formation_id, statut_paiement, date_inscription)
             VALUES (?, ?, ?, ?, "en_attente", NOW())'
        );
        $stmt->execute([$nom, $prenom, $email, $formation_id]);
        $id = $pdo->lastInsertId();

        header('Location: paiement.php?id=' . $id);
        exit();
    }
}
?>