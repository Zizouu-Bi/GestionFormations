<?php $pageTitle = 'Accueil'; require 'views/partials/header.php'; ?>

<div class="hero">
    <h1>Bienvenue sur <span>GestionFormations</span></h1>
    <p>Découvrez nos formations professionnelles et inscrivez-vous en ligne en quelques clics.</p>
    <div class="hero-buttons">
        <a href="index.php?page=formations" class="btn btn-primary">Voir les formations →</a>
        <a href="index.php?page=inscription" class="btn btn-outline">S'inscrire</a>
    </div>
</div>

<div class="stats">
    <div class="stat">
        <div class="stat-number">4+</div>
        <div class="stat-label">Formations disponibles</div>
    </div>
    <div class="stat">
        <div class="stat-number">100+</div>
        <div class="stat-label">Étudiants inscrits</div>
    </div>
    <div class="stat">
        <div class="stat-number">3</div>
        <div class="stat-label">Niveaux proposés</div>
    </div>
</div>

<main>
    <h2 class="section-title" style="margin-top:20px;">Pourquoi nous choisir ?</h2>
    <p class="section-subtitle">Une plateforme moderne pour apprendre à votre rythme</p>
</main>

<?php require 'views/partials/footer.php'; ?>