<?php
$action = $_REQUEST['action'];
switch($action)
{
  case 'connection':
  default:
  {
    include("vues/connection.php");
    break;
  }
  case 'confirmation':
  {
    $user = $university->getUser($_REQUEST['username'], $_REQUEST['password']);
    if($user != false) {
      $_SESSION['user'] = $user;
    }
    header('Location: ./index.php?uc=accueil');
      die();

    break;
  }
  case 'deconnection':
  {
    unset($_SESSION['user']);
    header('Location: ./index.php?uc=accueil');
    die();
    break;
  }
}
?>
