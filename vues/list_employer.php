<!-- list_employer.php -->
<!-- liste les employer -->
<div class="container">
    <form method="post" action="index.php?uc=planning&action=voir">
    <label for="agent">Agent Administrateur:</label>
        <select name="agent" class="form-control">
            <?php
                foreach($lesEmployers as $unEmployer) {
                    $nom = $unEmployer['NOM'];
                    $prenom = $unEmployer['PRENOM'];
                    $id = $unEmployer['ID'];
                    echo "<option value='".$id."'>".ucfirst($nom)." ".ucfirst($prenom)."</option>";
                }
            ?>
        </select>
        <button type="submit" class="button blue noAnim">Envoyer</button>
    </form>

</div>