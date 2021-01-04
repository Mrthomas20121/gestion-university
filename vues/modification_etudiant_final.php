<!-- modification_etudiant_final.php -->
<!-- formulaire de modification d'un(e) étudiant(e) -->
<div class="container">

    <form method="post" action="index.php?uc=etudiant&action=modifier">
        
        <?php 
        echo '<input type="hidden" name="id" value="'.$etudiant['ID'].'">';

        echo '<label for="prenom">Nouveau Prenom:</label><input type="text" class="form-control" name="prenom" value="'.$etudiant['PRENOM'].'">';
        echo '<label for="nom">Nouveau Nom:</label><input type="text" class="form-control" name="nom" value="'.$etudiant['NOM'].'">';
        echo '<label for="adresse">Nouvelle Adresse:</label><input type="text" class="form-control" name="adresse" value="'.$etudiant['ADRESSE'].'">';
        echo '<label for="tel">Nouveau Telephone:</label><input type="text" class="form-control" name="tel" value="'.$etudiant['TEL'].'">';
        echo '<label for="mail">Nouveau Mail:</label><input type="email" class="form-control" name="mail" value="'.$etudiant['MAIL'].'">';
        
        ?>
        
        <button type="submit" class="button blue noAnim">Mettre à jour</button>
    </form>

</div>