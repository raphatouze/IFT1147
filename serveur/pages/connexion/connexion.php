<?php
    session_start();
    require_once("../../includes/configbd.inc.php");
    
    $courriel = $_POST['courrielco'];
    $pass = $_POST['mdpco'];

    $requete = "SELECT * FROM connexion WHERE courriel = ? AND pass = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("ss", $courriel,$pass);
    $stmt->execute();
    $result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){//Si pas trouvé
        echo "SVP vérifiez vos paramètres de connexion";
		mysqli_close($connexion);
		exit;
    }
    if($ligne->statut == "A"){
        if($ligne->role == "M"){
            $_SESSION['usager']="M";
            header('Location: ../membre/membres.php');
            exit;
        }else  if($ligne->role == "A"){
            $_SESSION['usager']="A";
            header('Location: ../admin/admin.php');
            exit;
        }
    }
    else {
        header('Location: ../../../accueil.php?msg=Problème+avec+votre+compte.+Contactez+l\'administrateur');
        exit;
    }
?>