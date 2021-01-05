<!-- service.php -->
<!-- les services -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'ajouter':
    {
        $university->addService($_REQUEST['libelle'], $_REQUEST['prix']);
        header('Location: ./index.php?uc=message&message=Service '. $$_REQUEST['libelle'].' a été ajouté.');
        die();
        break;
    }
    case 'formAjout':
    {
        include("vues/ajout_service.php");
        break;
    }
    case 'formMod':
    case 'formSupp':
    {
        $lesServices = $university->getServices();
        $url = $action == 'formMod' ? 'index.php?uc=service&action=formModFinal': 'index.php?uc=service&action=supprimer'; // action du formulaire
        include("vues/list_service.php");
        break;
    }
    case 'formModFinal':
    {
        $service = $university->getService($_REQUEST['service']);
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

    case 'modifier':
    {
        $university->deleteService($_REQUEST['id']);
        $service->getService($_REQUEST['id']);
        header('Location: ./index.php?uc=message&message=Le service '. $service['LIBELLE'].' a été supprimer.');
        die();

        break;
    }
}