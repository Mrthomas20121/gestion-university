<!-- bandeau_online.php -->
<!-- bandeau de connection quand l'utilisateur est connecté-->
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Université d'Orléans</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#online" aria-controls="online" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="online">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?uc=accueil">Accueil</a>
                </li>
                <?php 
                
                if(isset($_SESSION['user'])) {
                    if($_SESSION['user']['id_categorie'] == 1) { // agent administrateur
                        echo '<li class="nav-item"><a class="nav-link" href="#">Planning</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="#">Synthèse d\'un(e) étudiant(e)</a></li>';
                    
                    }
                    else if($_SESSION['user']['id_categorie'] == 2) { // agent accueil
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="etudiant" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Etudiants
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="etudiant">
                          <li><a class="dropdown-item" href="index.php?uc=etudiant&action=ajouter">Saisir un étudiant</a></li>
                          <li><a class="dropdown-item" href="index.php?uc=etudiant&action=modifier">Modifier un étudiant</a></li>
                          <li><a class="dropdown-item" href="#">Synthèse d\'un(e) étudiant(e)</a></li>
                        </ul>
                      </li>';
                      echo '<li class="nav-item"><a class="nav-link" href="#">Rendez-vous</a></li>'; // rendez vous avec un agent administratif pour parler d'un service payant
                      echo '<li class="nav-item"><a class="nav-link" href="#">Payement</a></li>'; // effectuer le payement d'un service en cash/le mettre en différé
                      echo '<li class="nav-item"><a class="nav-link" href="#">Différé</a></li>'; // mettre un payement en différé, effectuer le remboursement d'un ou plusieur différe
                    }
                    else { // directeur

                    }
                }

                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?uc=connection&action=deconnection">Deconnection</a>
                </li>
            </ul>
        </div>
    </div>
</nav>