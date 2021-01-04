<!-- accueil.php -->
<!-- Responsable de l'affichage de la page d'accueil -->
<?php
if(isset($_SESSION['user'])) {
  include('vues/accueil.php');
}
else {
  header('Location: ./index.php?uc=connection&action=connection');
}
?>