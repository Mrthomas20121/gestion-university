<!-- planning.php -->
<!-- affiche le planing d'un agent administrateur -->
<div class="container">

    <h2>Planning de <?php echo $agent['NOM'] . " " . $agent['PRENOM']; ?> : </h2>
    <?php 
        foreach($lesPlannings as $unPlanning) {
            echo "<p>".$unPlanning['DATE'].": ".$unPlanning['ID_PRENDRE']."</p>";
        }
    
    ?>

</div>