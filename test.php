<?php 
$nom = "Aziz" ;
echo "portee 1 , le nom est : ".$GLOBALS['nom'];
?>  
<?php 
$formations = ["marketing digital" , "développement web" , "multimédia"] ;
echo $formations [1] ;
?>  
<?php 
$formations = ["Développement Web", "Réseaux", "Sécurité", "Base de données"];
foreach ($formations as $formation) {
echo $formation . "<br>";
}
$utilisateur = [
"nom" => "AYARI",
"prenom" => "Asma",
"email" => "asma@email.com",
"formation" => "Développement Web"
];
echo "Nom : " . $utilisateur["nom"] . "<br>";
echo "Prénom : " . $utilisateur["prenom"] . "<br>";
echo "Email : " . $utilisateur["email"] . "<br>";
echo "Formation : " . $utilisateur["formation"];
$formations = [
["nom" => "Développement Web", "duree" => "3 mois"],
["nom" => "Réseaux", "duree" => "2 mois"],
["nom" => "Sécurité", "duree" => "4 mois"]
];
foreach ($formations as $f) {
echo "Formation : " . $f["nom"] .
" - Durée : " . $f["duree"] . "<br>";

}
?> 