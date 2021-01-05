<!-- rendez_vous.php -->
<!-- prendre et regarder les rendez-vous -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'prendre':
    {
        $lesEmployers = $university->getEmployerFrom(1);
        $lesServices = $university->getServices();
        $lesEtudiants = $university->getEtudiants();
        include("vues/saisie_rendez_vous.php");
        break;
    }
    case 'ajouter':
    {
        $university->addRendezvous($_REQUEST['employer'], $_REQUEST['service'], $_REQUEST['etudiant'], $_REQUEST['date'], $_REQUEST['conclusion'], $_REQUEST['etat']);
        header('Location: ./index.php?uc=message&message=Un nouveau rendez-vous a été ajouté.');
        die();
        break;
    }
}
?>