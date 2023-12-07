<?php
	require_once("../../includes/configbd.inc.php");
	$idArticle=$_POST['idar'];	
	$requete="SELECT * FROM articles WHERE ida=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $idArticle);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
		mysqli_close($connexion);
		header('Location: ../admin/admin.php?msg=Article+est+introuvable');
		exit;
	}
	$image=$ligne->imageart;
	if($image!="avatar.png"){
		$rmImg='../../images_articles/'.$image;
		$tabFichiers = glob('../../images_articles/*');
		//print_r($tabFichiers);
		//parcourir les fichier
		foreach($tabFichiers as $fichier){
			if(is_file($fichier) && $fichier==trim($rmImg)) {
			// enlever le fichier
			unlink($fichier);
			break;
			//
			}
		}
	}
	$requete="DELETE FROM articles WHERE ida=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $idArticle);
	$stmt->execute();
	mysqli_close($connexion);
	header('Location: ../admin/admin.php?msg=Article+a+été+enlevé');
	exit;
?>