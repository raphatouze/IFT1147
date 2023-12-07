<?php
    require_once("../../includes/configbd.inc.php");
    $tab=array();
    $requete = "SELECT * FROM articles";
    try{
        $listeArticles=mysqli_query($connexion,$requete);
        $tab['OK']=true;
        $tab['listeArticles']=array();
        while($ligne=mysqli_fetch_object($listeArticles)){
            $tab['listeArticles'][] = $ligne;
        }
        $tab['categories']=array();
        $requete = "SELECT categ FROM categories";
        $listeCategories=mysqli_query($connexion,$requete);
        while($ligne=mysqli_fetch_object($listeCategories)){
            $tab['categories'][] = $ligne->categ;
        }
    }catch(Exception $e) {
        $tab['OK']=false;
    }finally {
        mysqli_close($connexion);
        echo json_encode($tab);
    }
?>