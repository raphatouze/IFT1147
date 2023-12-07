<?php
	require_once("../../includes/configbd.inc.php");
	$tabIdArticles=explode(";",$_POST['idaM']);//9;13;50
    $taille = count($tabIdArticles);
    
    function enleverUnArticle($idArticle){
        global $connexion;
        $requete="SELECT imageart FROM articles WHERE ida=?";
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
    }
    for($i=0; $i<$taille; $i++){
        enleverUnArticle($tabIdArticles[$i]);  
    }
	mysqli_close($connexion);
	header('Location: ../admin/admin.php?msg=Les+articles+choisis+ont+été+retirés');
	exit;
?>