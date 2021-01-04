<?php
if(isset($_SESSION['user'])) {
  include('vues/accueil.php');
}
else {
  header('Location: ./index.php?uc=connection&action=connection');
}
?>