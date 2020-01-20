<?php
require_once("Produit.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
$produit = new Produit();

if($operation=='ajouterProduit'){
    $fichierTmp = $_FILES['img']['tmp_name'];
    $nom_foto=$_FILES['img']['name'];
    move_uploaded_file($fichierTmp,'./image/'.$nom_foto);
    $resultat= $produit->ajouterProduit(true,$id_emplacement,$id_type_p,$quantite,$nom_foto);
    header("location:PageProduit.php?resultat=".$resultat);
}
elseif($operation=='modifierProduit'){
    $fichierTmp = $_FILES['img']['tmp_name'];
    $nom_foto=$_FILES['img']['name'];
    move_uploaded_file($fichierTmp,'./image/'.$nom_foto);
    $resultat=$produit->modifierProduit($id_produit,$id_emplacement,$nom_foto);
    header("location:AfficherProduit.php?resultat=".$resultat);
}
elseif($operation=='supprimerProduit'){
    $resultat=$produit->supprimerProduit($id_produit);
    header("location:AfficherProduit.php?resultat=".$resultat);
}

unset($produit);
?>