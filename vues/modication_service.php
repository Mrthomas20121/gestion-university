<!-- modification_service.php -->
<!-- formulaire de modification d'un service -->
<div class="container">
    <form method="post" action="index.php?uc=service&action=formModFinal">
        <!-- etudiant -->
        <label for="service">Service:</label>
        <select name="service" class="form-control">
            <?php
                foreach($lesServices as $unService) {
                    $libelle = $unService['LIBELLE'];
                    $prix = $unService['PRIX'];
                    $id = $unService['ID'];
                    echo "<option value='".$id."'>".ucfirst($libelle)."</option>";
                }
            ?>
        </select>
        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>