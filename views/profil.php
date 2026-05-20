<?php $pageTitle = 'Mon Profil'; require 'views/partials/header.php'; ?>

<main>
    <div style="max-width:600px;margin:0 auto">
        <h1 class="section-title" style="text-align:left;margin-bottom:8px">Mon Profil</h1>
        <p style="color:#94a3b8;margin-bottom:30px">Retrouvez votre inscription en saisissant votre email.</p>

        <!-- Formulaire de recherche -->
        <div class="form-section" style="margin-bottom:30px">
            <form method="POST" action="index.php?page=profil">
                <label>Votre email *</label>
                <input type="email" name="email" 
                       value="<?= htmlspecialchars($email_recherche) ?>" 
                       placeholder="exemple@email.com" required>

                <?php if (!empty($erreur)): ?>
                    <div class="alert alert-error" style="margin-top:15px">
                        <?= htmlspecialchars($erreur) ?>
                    </div>
                <?php endif; ?>

                <input type="submit" value="Rechercher mon profil →" class="btn btn-primary" style="cursor:pointer;width:100%;margin-top:20px">
            </form>
        </div>

        <!-- Résultat -->
        <?php if ($inscription): ?>
            <div style="background:var(--navy2);border:1px solid rgba(37,99,235,0.3);border-radius:16px;padding:35px">
                
                <!-- En-tête profil -->
                <div style="display:flex;align-items:center;gap:20px;margin-bottom:25px">
                    <div style="width:60px;height:60px;background:var(--accent);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.5rem;font-weight:700;flex-shrink:0">
                        <?= strtoupper(substr($inscription['prenom'], 0, 1)) ?>
                    </div>
                    <div>
                        <h2 style="font-size:1.4rem"><?= htmlspecialchars($inscription['prenom']) ?> <?= htmlspecialchars($inscription['nom']) ?></h2>
                        <p style="color:#94a3b8"><?= htmlspecialchars($inscription['email']) ?></p>
                    </div>
                </div>

                <hr style="border-color:rgba(37,99,235,0.2);margin-bottom:25px">

                <!-- Formation inscrite -->
                <h3 style="color:#3b82f6;margin-bottom:15px">📚 Formation inscrite</h3>
                <div style="background:var(--navy);border-radius:10px;padding:20px">
                    <p style="font-size:1.1rem;font-weight:600;margin-bottom:12px">
                        <?= htmlspecialchars($inscription['formation_titre']) ?>
                    </p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:12px">
                        <span class="badge">⏱ <?= htmlspecialchars($inscription['duree']) ?></span>
                        <span class="badge">📊 <?= htmlspecialchars($inscription['niveau']) ?></span>
                        <span class="badge">💰 <?= number_format($inscription['prix'], 2, ',', ' ') ?> DT</span>
                    </div>
                    <p style="color:#94a3b8;font-size:0.9rem">
                        Inscrit le : <?= date('d/m/Y à H:i', strtotime($inscription['date_inscription'])) ?>
                    </p>
                </div>

                <hr style="border-color:rgba(37,99,235,0.2);margin:25px 0">

                <!-- Statut paiement -->
                <h3 style="color:#3b82f6;margin-bottom:15px">💳 Statut du paiement</h3>
                <?php if ($inscription['statut_paiement'] === 'paye'): ?>
                    <div style="background:rgba(37,99,235,0.15);border:1px solid rgba(37,99,235,0.4);border-radius:8px;padding:15px;display:flex;align-items:center;gap:10px">
                        <span style="font-size:1.5rem">✅</span>
                        <div>
                            <p style="color:#3b82f6;font-weight:600">Paiement confirmé</p>
                            <p style="color:#94a3b8;font-size:0.9rem">Vous avez accès à vos cours</p>
                        </div>
                    </div>
                    <!-- Bouton accès cours -->
                    <div style="margin-top:20px;text-align:center">
                        <?php
                        // Restaurer la session pour accéder aux cours
                        $_SESSION['paiement_ok'] = true;
                        $_SESSION['inscription_id'] = $inscription['id'];
                        $_SESSION['formation_titre'] = $inscription['formation_titre'];
                        $_SESSION['etudiant_prenom'] = $inscription['prenom'];
                        ?>
                        <a href="index.php?page=cours" class="btn btn-primary" style="font-size:1rem;padding:14px 35px">
                            Accéder à mes cours →
                        </a>
                    </div>
                <?php elseif ($inscription['statut_paiement'] === 'en_attente'): ?>
                    <div style="background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.4);border-radius:8px;padding:15px;display:flex;align-items:center;gap:10px">
                        <span style="font-size:1.5rem">⏳</span>
                        <div>
                            <p style="color:#f59e0b;font-weight:600">Paiement en attente</p>
                            <p style="color:#94a3b8;font-size:0.9rem">Finalisez votre paiement pour accéder aux cours</p>
                        </div>
                    </div>
                    <div style="margin-top:20px;text-align:center">
                        <a href="index.php?page=paiement&id=<?= $inscription['id'] ?>" class="btn btn-primary">
                            Finaliser le paiement →
                        </a>
                    </div>
                <?php else: ?>
                    <div style="background:rgba(220,38,38,0.15);border:1px solid rgba(220,38,38,0.4);border-radius:8px;padding:15px;display:flex;align-items:center;gap:10px">
                        <span style="font-size:1.5rem">❌</span>
                        <div>
                            <p style="color:#ef4444;font-weight:600">Paiement échoué</p>
                            <p style="color:#94a3b8;font-size:0.9rem">Veuillez réessayer le paiement</p>
                        </div>
                    </div>
                    <div style="margin-top:20px;text-align:center">
                        <a href="index.php?page=paiement&id=<?= $inscription['id'] ?>" class="btn btn-primary">
                            Réessayer le paiement →
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require 'views/partials/footer.php'; ?>