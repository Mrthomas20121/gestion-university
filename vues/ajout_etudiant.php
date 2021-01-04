<!-- ajout_etudiant.php -->
<!-- formulaire d'ajout d'un(e) étudiant(e) -->
<div class="container">

    <h2>Ajoute un(e) etudiant(e)</h2>
    <form method="post" action="index.php?uc=etudiant&action=ajouter">
        <!-- nom -->
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom">

        <!-- prenom -->
        <label for="prenom">Prenom:</label>
        <input type="text" class="form-control" name="prenom">

        <!-- Addresse -->
        <label for="addresse">Addresse:</label>
        <input type="text" class="form-control" name="addresse">

        <!-- Telephone -->
        <label for="tel">Numéro de Telephone:</label>
        <input type="text" class="form-control" name="tel">

        <!-- Mail -->
        <label for="mail">Mail:</label>
        <input type="mail" class="form-control" name="mail">

        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>