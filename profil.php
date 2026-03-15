<?php 
$nom = "AYARI"; 
$prenom = "Asma"; 
$email = "asma.ayari@email.com"; 
$age = 30; 
$ville = "Tunis"; 
$formation = "marketing digital"; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Profil utilisateur</title>
</head>
<body>

<h1>Profil utilisateur</h1>

<p><strong>Nom :</strong> <?php echo $nom; ?></p>
<p><strong>Prénom :</strong> <?php echo $prenom; ?></p>
<p><strong>Email :</strong> <?php echo $email; ?></p>
<p><strong>Âge :</strong> <?php echo $age; ?> ans</p>

<p>Bienvenue <?php echo $prenom; ?> dans la formation <?php echo $formation; ?></p>

</body>
</html>