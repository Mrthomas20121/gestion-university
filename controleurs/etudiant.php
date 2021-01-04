<!-- etudiant.php -->
<!-- responsable de l'ajout et la modification d'un(e) etudiant(e) -->
<!-- usage: index.php?ec=etudiant&action=ajouter, index.php?ec=etudiant&action=modifier, index.php?ec=etudiant&action=synthese -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
  case 'ajouter':
  default:
  {
    include("vues/accueil.php");
    break;
  }
  case 'modifier':
  {
    $user = $university->getUser($_REQUEST['username'], $_REQUEST['password']);
    if($user != false) {
      $_SESSION['user'] = $user;
    }
    header('Location: ./index.php?uc=accueil');
      die();

    break;
  }

  case 'synthese':
    {
      
  
      break;
    }
}
?>