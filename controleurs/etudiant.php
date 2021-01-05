<!-- etudiant.php -->
<!-- responsable de l'ajout et la modification d'un(e) etudiant(e) -->
<!-- usage: index.php?ec=etudiant&action=ajouter -->
<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'ajouter':
    {
        $university->addEtudiant($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['adresse'], $_REQUEST['tel'], $_REQUEST['mail']);
        header('Location: ./index.php?uc=message&message=Etudiant '. $_REQUEST['nom'].' a été ajouté.');
        die();
        break;
    }
    case 'formAjout':
    {
        include("vues/ajout_etudiant.php");
        break;
    }
    case 'formMod':
    {
        $lesEtudiants = $university->getEtudiants();
        include("vues/modification_etudiant.php");
        break;
    }
    case 'formModFinal':
    {
        $etudiant = $university->getEtudiant($_REQUEST['etudiant']);
        include("vues/modification_etudiant_final.php");
        break;
    }
    case 'modifier':
    {
        $university->editEtudiant($_REQUEST['id'], $_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['adresse'], $_REQUEST['tel'], $_REQUEST['mail']);
        header('Location: ./index.php?uc=message&message=Etudiant '. $_REQUEST['nom'].' a été modifié.');
        die();

        break;
    }

    case 'synthese':
    {
      

        break;
    }
}
?>