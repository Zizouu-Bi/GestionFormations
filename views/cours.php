<?php $pageTitle = 'Cours'; require 'views/partials/header.php'; ?>

<main>
    <div class="cours-header">
        <h1>📚 Vos Cours</h1>
        <p style="color:#94a3b8;margin-top:10px">Bienvenue <strong style="color:white"><?= htmlspecialchars($_SESSION['etudiant_prenom']) ?></strong> — Formation : <strong style="color:#3b82f6"><?= htmlspecialchars($_SESSION['formation_titre']) ?></strong></p>
    </div>

    <div class="chapitres">
        <div class="chapitre">
            <div class="chapitre-num">1</div>
            <div>
                <strong>Introduction</strong>
                <p style="color:#94a3b8;font-size:0.9rem">Présentation du cours et des objectifs</p>
            </div>
        </div>
        <div class="chapitre">
            <div class="chapitre-num">2</div>
            <div>
                <strong>Concepts fondamentaux</strong>
                <p style="color:#94a3b8;font-size:0.9rem">Les bases théoriques essentielles</p>
            </div>
        </div>
        <div class="chapitre">
            <div class="chapitre-num">3</div>
            <div>
                <strong>Mise en pratique</strong>
                <p style="color:#94a3b8;font-size:0.9rem">Exercices et travaux pratiques</p>
            </div>
        </div>
        <div class="chapitre">
            <div class="chapitre-num">4</div>
            <div>
                <strong>Projet final</strong>
                <p style="color:#94a3b8;font-size:0.9rem">Réalisation d'un projet complet</p>
            </div>
        </div>
    </div>

    <br>
    <a href="index.php" class="btn btn-outline">← Retour à l'accueil</a>
</main>

<?php require 'views/partials/footer.php'; ?>