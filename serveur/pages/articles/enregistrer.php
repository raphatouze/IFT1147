<?php
	require_once("../../includes/configbd.inc.php");
	$nom=$_POST['nom']; 
	$desc=$_POST['desc'];
	$categ=$_POST['categ'];
	$prix = $_POST['prix'];
	$qted = $_POST['qted'];
	$seuil = $_POST['seuil'];
	$dossier="../../images_articles/";
	$image="avatar.png";
	if($_FILES['img']['tmp_name']!==""){
		$nomImage=sha1($nom.time());
		//Upload de la photo
		$tmp = $_FILES['img']['tmp_name'];
		$fichier= $_FILES['img']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomImage.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$image=$nomImage.$extension;
	}
	try{
		$requete="INSERT INTO articles values(0,?,?,?,?,?,?,?)";
		$stmt = $connexion->prepare($requete);
		$stmt->bind_param("ssssiid", $nom,$desc,$image,$categ,$qted,$seuil,$prix); //Selon l'ordre des colonnes de la table categories
		$stmt->execute();
	} catch(Exception $e){
		//Retourner le message voulu
	}finally {
		mysqli_close($connexion);
	}
	header('Location: ../admin/admin.php?msg=Article+a+été+enregistré');
?>