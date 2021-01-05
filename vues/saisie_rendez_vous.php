<!-- saisie_rendez_vous.php -->
<!-- formulaire de saisie de rendez vous -->
<div class="container">

    <h2>Prendre un Rendez vous</h2>
    <form method="post" action="index.php?uc=rendezvous&action=ajouter">
        <!-- Libelle -->

        <label for="employer">Agent Administrateur:</label>
        <select name="employer" class="form-control">
            <?php
                foreach($lesEmployers as $unEmployer) {
                    $nom = $unEmployer['NOM'];
                    $prenom = $unEmployer['PRENOM'];
                    $id = $unEmployer['ID'];
                    echo "<option value='".$id."'>".ucfirst($nom)." ".ucfirst($prenom)."</option>";
                }
            ?>
        </select>

        <label for="service">Service:</label>
        <select name="service" class="form-control">
            <?php
                foreach($lesServices as $unService) {
                    $libelle = $unService['LIBELLE'];
                    $id = $unService['ID'];
                    echo "<option value='".$id."'>".ucfirst($libelle)."</option>";
                }
            ?>
        </select>

        <label for="etudiant">Etudiant(e):</label>
        <select name="etudiant" class="form-control">
            <?php
                foreach($lesEtudiants as $unEtudiant) {
                    $nom = $unEtudiant['NOM'];
                    $prenom = $unEtudiant['PRENOM'];
                    $id = $unEtudiant['ID'];
                    echo "<option value='".$id."'>".ucfirst($nom)." ".ucfirst($prenom)."</option>";
                }
            ?>
        </select>

        <label for="date">Date:</label>
        <input type="date" class="form-control" name="date">

        <label for="conclusion">Conclusion:</label>
        <input type="text" class="form-control" name="conclusion">

        <label for="etat">Etat du Payement:</label>
        <select name="etat" class="form-control">
            <option value="en attente de payement">En attente de payement</option>
            <option value="payée">Payée</option>
            <option value="en différé">En différé</option>
        </select>

        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>