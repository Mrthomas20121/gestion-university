<?php
if(isset($_SESSION['user'])) {
  include('vues/v_accueil.php');
}
else {
    include("controleurs/connection.php");
}
?>