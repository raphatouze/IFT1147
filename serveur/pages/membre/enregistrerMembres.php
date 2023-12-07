<?php
    session_start();
    require_once("../../includes/configbd.inc.php");
    
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $courriel = $_POST['courriel'];
    $pass = $_POST['pass'];
    $sexe = $_POST['sexe'];
    $datenaissance = $_POST['datenaissance'];

    $requete = "INSERT INTO membres VAlUES (0,?,?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("sssss", $prenom,$nom,$courriel,$sexe,$datenaissance);
    $stmt->execute();
    $idm = $connexion->insert_id;

    $requete = "INSERT INTO connexion VAlUES (?,?,?,'M','A')";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("iss", $idm,$courriel,$pass);
    $stmt->execute();
    mysqli_close($connexion);
    header('Location:../../../accueil.php');
    exit;
?>