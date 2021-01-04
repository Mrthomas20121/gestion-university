<?php
$action = $_REQUEST['action'];
switch($action)
{
  case 'accueil':
  default:
  {
    include("vues/accueil.php");
    break;
  }
  case 'administrateur':
  {
    $user = $university->getUser($_REQUEST['username'], $_REQUEST['password']);
    if($user != false) {
      $_SESSION['user'] = $user;
    }
    header('Location: ./index.php?uc=accueil');
      die();

    break;
  }
  case 'directeur':
  {
    unset($_SESSION['user']);
    header('Location: ./index.php?uc=accueil');
    die();
    break;
  }
}
?>