<?php $pageTitle = 'Formations'; require 'views/partials/header.php'; ?>

<main>
    <h1 class="section-title">Nos Formations</h1>
    <p class="section-subtitle">Choisissez parmi nos programmes certifiants</p>

    <div class="filtres">
        <a href="index.php?page=formations">Toutes</a>
        <a href="index.php?page=formations&niveau=Débutant">Débutant</a>
        <a href="index.php?page=formations&niveau=Intermédiaire">Intermédiaire</a>
        <a href="index.php?page=formations&niveau=Avancé">Avancé</a>
    </div>

    <?php if (empty($formations)): ?>
        <p style="text-align:center;color:#94a3b8">Aucune formation disponible.</p>
    <?php else: ?>
        <div class="formations-grid">
            <?php foreach ($formations as $f): ?>
                <div class="formation">
                    <h2><?= htmlspecialchars($f['titre']) ?></h2>
                    <p><?= htmlspecialchars($f['description']) ?></p>
                    <div class="formation-meta">
                        <span class="badge">⏱ <?= htmlspecialchars($f['duree']) ?></span>
                        <span class="badge">📊 <?= htmlspecialchars($f['niveau']) ?></span>
                    </div>
                    <div class="prix"><?= number_format($f['prix'], 2, ',', ' ') ?> DT</div>
                    <a href="index.php?page=inscription&formation_id=<?= $f['id'] ?>" class="btn btn-primary">S'inscrire →</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php require 'views/partials/footer.php'; ?>