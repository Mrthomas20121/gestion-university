<?php
session_start();
require_once("modele/class.university.php");
include("vues/entete.php");
include("vues/header.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$university = University::getUniversity();
switch($uc)
{
	case 'accueil':
		{include("controleurs/accueil.php");break;}
  case 'connection' :
    { include("controleurs/connection.php");break;  }
}
include("vues/footer.php") ;
?>
