<?php
if(isset($_SESSION['user'])) {
  include('vues/bandeau_online.php');
}
else {
    include('vues/bandeau_offline.php');
}
?>