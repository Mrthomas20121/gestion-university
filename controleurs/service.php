<!-- service.php -->
<!-- les services -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'ajouter':
    {
        $university->addService($_REQUEST['libelle'], $_REQUEST['prix']);
        header('Location: ./index.php?uc=accueil');
        die();
        break;
    }
    case 'formMod':
    {
        $lesEtudiants = $university->getServices();
        include("vues/modification_service.php");
        break;
    }
    case 'formModFinal':
    {
        $etudiant = $university->getService($_REQUEST['service']);
        include("vues/modification_service_final.php");
        break;
    }
    case 'modifier':
    {
        $university->editService($_REQUEST['id'], $_REQUEST['libelle'], $_REQUEST['prix']);
        header('Location: ./index.php?uc=message&message=Service '. $_REQUEST['libelle'].' a été modifié.');
        die();

        break;
    }
}