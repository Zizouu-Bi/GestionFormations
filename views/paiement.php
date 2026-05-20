<?php $pageTitle = 'Paiement'; require 'views/partials/header.php'; ?>

<main>
    <div class="paiement-card">
        <h1>💳 Paiement</h1>

        <?php if ($erreur_paiement): ?>
            <div class="alert alert-error">Paiement refusé. Veuillez réessayer.</div>
        <?php endif; ?>

        <div class="paiement-info">
            <p>
                <strong>Formation :</strong>
                <?= htmlspecialchars($inscription['formation_titre']) ?>
            </p>

            <p>
                <strong>Étudiant :</strong>
                <?= htmlspecialchars($inscription['prenom']) ?>
                <?= htmlspecialchars($inscription['nom']) ?>
            </p>

            <p>
                <strong>Montant :</strong>
                <span style="color:#3b82f6;font-size:1.2em;font-weight:700">
                    <?= number_format($inscription['prix'], 2, ',', ' ') ?> DT
                </span>
            </p>
        </div>

        <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>">

            <!-- Informations bancaires -->
            <div class="bank-section">
                <h2>Informations bancaires</h2>

                <label for="titulaire">Nom du titulaire</label>
                <input
                    type="text"
                    id="titulaire"
                    name="titulaire"
                    placeholder="Ex : Mohamed Ben Ali"
                    required
                >

                <label for="numero_carte">Numéro de carte</label>
                <input
                    type="text"
                    id="numero_carte"
                    name="numero_carte"
                    placeholder="1234 5678 9012 3456"
                    maxlength="19"
                    required
                >

                <div class="bank-row">
                    <div>
                        <label for="expiration">Date d'expiration</label>
                        <input
                            type="text"
                            id="expiration"
                            name="expiration"
                            placeholder="MM/AA"
                            maxlength="5"
                            required
                        >
                    </div>

                    <div>
                        <label for="cvv">CVV</label>
                        <input
                            type="password"
                            id="cvv"
                            name="cvv"
                            placeholder="123"
                            maxlength="4"
                            required
                        >
                    </div>
                </div>
            </div>

            <div class="paiement-buttons">
                <button type="submit" name="mode" value="ok" class="btn btn-primary">
                    ✓ Confirmer le paiement
                </button>

                <button type="submit" name="mode" value="echec" class="btn btn-danger">
                    ✗ Simuler un échec
                </button>
            </div>

        </form>
    </div>
</main>

<?php require 'views/partials/footer.php'; ?>