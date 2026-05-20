<?php
require_once 'models/Inscription.php';

$id = $_SESSION['inscription_id'] ?? 0;
$inscription = Inscription::getById($id);

require 'views/cours.php';
?>