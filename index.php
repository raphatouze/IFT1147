<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="client/public/js/monJS.js"></script>
    <script src="client/public/js/requetes.js"></script>
    <script src="client/public/js/langues.js"></script>
    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="client/utilitaires/icons-1.8.1/bootstrap-icons.css">
    <link rel="stylesheet" href="client/public/css/style.css">

    <title id="titre"> LocaFilms</title>
</head>

<body onLoad="chargerArticles('I','serveur/pages/articles/liste.php');">
    <?php
      include_once('serveur/includes/menu_accueil.inc.php');
  ?>
    <br>
    <div class="container" id="contenu"></div>

    <!-- Fin de menu de navigation -->
    <div class="container">
        <!-- Modal Enregistrer -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrer membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="serveur/membre/controleurMembre.php" method="POST" enctype="multipart/form-data" class="row g-3" onSubmit="return validerFormEnreg();">
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control is-valid" id="prenom" name="prenom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control is-valid" id="nom" name="nom" required>
                        </div>
                        <div class="col-md-12">
                            <label for="courriel" class="form-label">Courriel</label>
                            <input type="email" class="form-control is-valid" id="courriel" name="courriel" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pass" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control is-valid" id="mdp" name="mdp" oninput="validatePassword()" required>
                            <span id="msgPass"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="cpass" class="form-label">Confirmer mot de passe</label>
                            <input type="password" class="form-control is-valid" id="mdpc" name="mdpc" oninput="validatePassword()" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sexe</label>
                        <div id="sexe" aria-describedby="validationServer04Feedback">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="feminin" value="F" required>
                            <label class="form-check-label" for="feminin">Féminin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="M">
                            <label class="form-check-label" for="masculin">Masculin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexe" id="autres" value="A">
                            <label class="form-check-label" for="autres">Autres</label>
                        </div>
                    </div>
                </div>

                        <div class="col-md-6">
                            <label for="daten" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control is-valid" id="daten" name="daten" required>
                        </div>
                        <div class="col-md-12">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control is-valid" id="photo" name="photo[]" required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal Connexion -->
        <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="ModalConnexionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalConnexionLabel">Connexion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="formConnexion" action="serveur\pages\connexion\connexion.php" method="POST">
                            <div class="col-md-4">
                                <label for="courriel" class="form-label">Courriel</label>
                                <input type="email" class="form-control" id="courrielco" name="courrielco" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pass" class="form-label">Mot Passe</label>
                                <input type="password" class="form-control" pattern="[A-Za-z0-9_\$#\-]{5,10}$" id="mdpco" name="mdpco" required>
                            </div>
                            <input type="hidden" name="action" value="connexion">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
</body>

</html>