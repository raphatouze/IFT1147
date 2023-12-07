<?php
	require_once("../../includes/configbd.inc.php");
	$idArticle=$_POST['ida_m'];
	$nom=$_POST['nom_m']; 
	$desc=$_POST['desc_m'];
	$categ=$_POST['categ_m'];
	$prix = $_POST['prix_m'];
	$qted = $_POST['qted_m'];
	$seuil = $_POST['seuil_m'];
	$dossier="../../images_articles/";
	//Recupérer l'ancienne image pour la remplacer si une nouvelle image
	//a été envoyé  ou pour la garder lors de la mise-à-jour.
	$requette="SELECT imageart FROM articles WHERE ida=?";
	$stmt = $connexion->prepare($requette);
	$stmt->bind_param("i", $idArticle);
	$stmt->execute();
	$result = $stmt->get_result();
	$ligne = $result->fetch_object();
	$image=$ligne->imageart;
	//Si une nouvelle image a été envoyée
	if($_FILES['img_m']['tmp_name']!==""){
		//enlever ancienne image
		if($image!="avatar.png"){
			$rmImg='../../images_articles/'.$image;
			$tabFichiers = glob('../../images_articles/*');
			//print_r($tabFichiers);
			// parcourir les fichier
			foreach($tabFichiers as $fichier){
			  if(is_file($fichier) && $fichier==trim($rmImg)) {
				// enlever le fichier
				unlink($fichier);
				break;
				//
			  }
			}
		}
		$nouvelleImage=sha1($nom.time());
		//Upload de la photo
		$tmp = $_FILES['img_m']['tmp_name'];
		$fichier= $_FILES['img_m']['name'];
		$extension=strrchr($fichier,'.');
		$image=$nouvelleImage.$extension;
		@move_uploaded_file($tmp,$dossier.$image);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
	}
	$requette="UPDATE articles SET nomarticle=?,description=?,categorie=?,qteinventaire=?, imageart=?, seuil=?, prix=? WHERE ida=?";
	$stmt = $connexion->prepare($requette);
	$stmt->bind_param("sssisidi",$nom, $desc, $categ, $qted, $image, $seuil, $prix, $idArticle);
	$stmt->execute();
	mysqli_close($connexion);
	header('Location: ../admin/admin.php?msg=Article+a+été+modifié');
?>