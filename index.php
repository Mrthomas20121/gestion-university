<?php
session_start();

// ajoute la class php une seul fois
require_once("modele/class.university.php");

// le header de toutes les pages.
include("vues/header.php");
include("controleurs/bandeau.php");

if(!isset($_REQUEST['uc']))
    $uc = 'accueil';
else
    $uc = $_REQUEST['uc'];

$university = University::getUniversity();
switch($uc) {
	case 'accueil': {
        include("controleurs/accueil.php");
        break;
    }
    case 'connection': {
        include("controleurs/connection.php");
        break;  
    }
    case 'etudiant': {
        include("controleurs/etudiant.php");
        break;  
    }
    case 'message': {
        include("controleurs/message.php");
        break;  
    }
}

// footer de toutes les pages.
include("vues/footer.php");
?>
