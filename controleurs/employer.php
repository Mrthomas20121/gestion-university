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
    case 'etudiant-saisie':
    {
        $user = $university->getUser($_REQUEST['username'], $_REQUEST['password']);
        if($user != false) {
            $_SESSION['user'] = $user;
        }
        header('Location: ./index.php?uc=accueil');
        die();

        break;
    }
    case 'etudiant-modification':
    {
      $user = $university->getUser($_REQUEST['username'], $_REQUEST['password']);
      if($user != false) {
          $_SESSION['user'] = $user;
      }
      header('Location: ./index.php?uc=accueil');
      die();
  
      break;
    }
    case 'synthèse':
    {
    
      break;
    }
  case 'synthèse':
    {
    
      break;
    }
}
?>