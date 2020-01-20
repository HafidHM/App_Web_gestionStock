<?php
require_once("ClasseMagasin.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);

$Magasin = new ClasseMagasin();
if($operation=='Ajouter_Article_Produit'){
    $resultat= $Magasin->Ajouter_Article_Produit($type,$nom_type,$quantite_e);
  header("location:Magasin.php?resultat=".$resultat);
}
elseif($operation=='supprimerType'){
    $resultat=$Magasin->supprimerType($id_type_a);
    header("location:AfficherMagasin.php?resultat=".$resultat);
}
elseif($operation=='modifierType'){
    $resultat=$Magasin->modifierType($nom_type,$quantite_e,$id_type_a);
    header("location:AfficherMagasin.php?resultat=".$resultat);
}
elseif($operation=='AjouterType_a'){
    $resultat=$Magasin->AjouterType_a($nom_type);
    header("location:AjouterType_a.php?resultat=".$resultat);
}
unset($Magasin);
?>