<?php

//error_reporting(1)

//require_once("ClassFornisseur.php");
require_once("Avoir.php");
require_once("Type_A.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
//$fournisseur = new ClassFornisseur();
$av = new Avoir();
$type = new Type_A();
/*
if($operation=='ajouterFournisseur'){
	$resultat= $fournisseur->ajouterFournisseur($id_fournisseur,$nom,$adresse,$telephone);
header("location:Fournisseur.php?resultat=".$resultat);
}
elseif($operation=='modifierFournisseur'){
    $resultat=$fournisseur->modifierFournisseur($id_fournisseur,$nom,$adresse,$telephone);
   header("location:ModifierFr.php?resultat=".$resultat);
}
elseif($operation=='supprimerFournisseur'){
    $resultat=$fournisseur->supprimerFournisseur($nom);
header("location:ModifierFr.php?resultat=".$resultat);
}
*/
if($operation=='ajouter_article_desirer'){
    $resultat=$av->ajouter_article_desirer($id_type,$id_emplacement,$quantite_article_desire);
header("location:information_emplacement.php?id_emplacement=".$id_emplacement);
}
elseif($operation=='supprimer_article_desire'){
    $resultat=$av->supprimer_article_desire($id_emplacement,$id_article_desire);
header("location:Emplacement.php?resultat=".$resultat);
}
elseif($operation=='modifier_article_desire'){
    $resultat=$av->modifier_article_desire($id_emplacement,$id_article_desire,$quantite_article_desire_modification);
header("location:Emplacement.php?resultat=".$resultat);
}
unset($fournisseur);

?>