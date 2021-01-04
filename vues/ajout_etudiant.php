<!-- ajout_etudiant.php -->
<!-- formulaire d'ajout d'un(e) étudiant(e) -->
<div class="container">

    <form method="post" action="index.php?uc=etudiant&action=ajouter">
        <!-- nom -->
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" placeholder="nom">

        <!-- prenom -->
        <label for="prenom">Prenom:</label>
        <input type="text" class="form-control" name="prenom" placeholder="prenom">

        <!-- Addresse -->
        <label for="addresse">Addresse:</label>
        <input type="text" class="form-control" name="addresse" placeholder="addresse">

        <!-- Telephone -->
        <label for="tel">Numéro de Telephone:</label>
        <input type="text" class="form-control" name="tel" placeholder="Numéro de Telephone">

        <!-- Mail -->
        <label for="mail">Mail:</label>
        <input type="mail" class="form-control" name="mail" placeholder="mail">

        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>