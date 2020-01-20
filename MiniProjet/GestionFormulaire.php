<?php

require_once("Fournisseur.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);

$fournisseur = new Fournisseur();
if($operation=='ajouterFournisseur'){
	$resultat= $fournisseur->ajouterFournisseur($nom,$adresse,$telephone);
header("location:PageFournisseur.php?resultat=".$resultat);
}
elseif($operation=='modifierFournisseur'){
    $resultat=$fournisseur->modifierFournisseur($nom,$adresse,$telephone,$id_fournisseur);
    header("location:AfficherFour.php?resultat=".$resultat);
}
elseif($operation=='supprimerFournisseur'){
    $resultat=$fournisseur->supprimerFournisseur($id_fournisseur);
header("location:AfficherFour.php?resultat=".$resultat);
}
unset($fournisseur);
?>
