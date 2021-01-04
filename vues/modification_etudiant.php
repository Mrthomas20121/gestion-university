<!-- modification_etudiant.php -->
<!-- Selection d'un(e) étudiant(e) -->
<div class="container">
    <form method="post" action="index.php?uc=etudiant&action=formModFinal">
        <!-- etudiant -->
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
        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>