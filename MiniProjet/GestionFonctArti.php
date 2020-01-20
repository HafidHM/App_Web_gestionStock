<?php
require_once("Article_e.php");

extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
$article = new Article_e();
if($operation=='ajouterArticle'){
    $fichierTmp = $_FILES['img']['tmp_name'];
    $nom_foto=$_FILES['img']['name'];
    move_uploaded_file($fichierTmp,'./image/'.$nom_foto);
    $resultat= $article->ajouterArticle(true,$id_emplacement,$id_type_a,$quantite,$nom_foto);
  header("location:PageArticle.php?resultat=".$resultat);
}
elseif($operation=='modifierArticle'){
     $fichierTmp = $_FILES['img']['tmp_name'];
    $nom_foto=$_FILES['img']['name'];
    move_uploaded_file($fichierTmp,'./image/'.$nom_foto);
  $resultat=$article->modifierArticle($id_article_e,$id_emplacement,$nom_foto);

  header("location:AfficherArticle.php?resultat=".$resultat);
}
elseif($operation=='SupprimQuantArticle'){
    $resultat=$article->SupprimQuantArticle($id_emplacement,$id_type_a,$quantite);
 header("location:AfficherArticle.php?resultat=".$resultat);
}
elseif($operation=='supprimerArticle'){
    $resultat=$article->supprimerArticle($id_article_e);
    header("location:AfficherArticle.php?resultat=".$resultat);
}
unset($article);

?>