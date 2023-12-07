<?php
    define("SERVEUR","localhost");
    define("USAGER","root");
    define("PASSE","");
    define("BD","bdboutique");
    $connexion = new mysqli(SERVEUR,USAGER,PASSE,BD);
    if ($connexion->connect_errno) {
      echo "Problème de connexion au serveur de bd";
      exit();
	}
?>