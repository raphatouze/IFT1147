<?php
    session_start();    
    if(!isset($_SESSION['usager'])){
        header('Location: ../../../index.php?msg=Problème+avec+votre+connexion');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="../../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="../../../client/utilitaires/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="../../../client/public/js/monJS.js"></script>
    <script src="../../../client/public/js/requetes.js"></script>
    <link rel="stylesheet" href="../../../client/utilitaires/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet"  href="../../../client/utilitaires/icons-1.8.1/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../client/public/css/style.css">
</head>
<body onLoad="chargerArticles('M','../articles/liste.php');">
    <?php
         require_once("../../includes/menu_membre.inc.php");
    ?>
     <br><br><br>
  <div class="container" id="contenu"></div>
  <!-- Modal du panier -->
  <div class="modal fade" id="idModPanier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contenuPanier"></div>
      </div>
    </div>
  </div>
</div>
 <!-- Fin du modal du panier -->
  <form id="dc" action="../connexion/deconnecter.php" method="POST"></form>
  <script src="../../../client/public/js/panier.js"></script>
</html>