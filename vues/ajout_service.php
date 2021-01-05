<!-- ajout_service.php -->
<!-- formulaire d'ajout d'un service -->
<div class="container">

    <h2>Ajoute d'un service</h2>
    <form method="post" action="index.php?uc=service&action=ajouter">
        <!-- service -->
        <label for="libelle">service:</label>
        <input type="text" class="form-control" name="libelle">

        <!-- Prix -->
        <label for="prix">Prix:</label>
        <input type="text" class="form-control" name="prix">

        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>