<!-- modification_service.php -->
<!-- formulaire de modification d'un service -->
<div class="container">

    <form method="post" action="index.php?uc=service&action=modifier">
        
        <?php 
        echo '<input type="hidden" name="id" value="'.$service['ID'].'">';

        echo '<label for="libelle">Nouveau Nom:</label><input type="text" class="form-control" name="libelle" value="'.$service['LIBELLE'].'">';
        echo '<label for="prix">Nouveau Prix:</label><input type="text" class="form-control" name="prix" value="'.$service['PRIX'].'">';
        ?>
        
        <button type="submit" class="button blue noAnim">Mettre à jour</button>
    </form>

</div>