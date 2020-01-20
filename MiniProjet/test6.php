<?php

extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);

 if($type == 'Article')
 {
     require_once("Emplacement_article.php");
     $emplacement = new Emplacement_article();
     $type = $emplacement->get_type();
     $type->execute();

           echo ' <label>Article</label><select  name="nom_type" class="form-control" autofocus>';
                    while ($Pr = $type->fetch()) {
                       echo " <option> ".$Pr["nom_type"]." </option>";
                     }
                     echo "</select>";

 }
 else
 {
     require_once("Article_e.php");
     $article = new Article_e();
     $type = $article->get_type();
     $type->execute();
     $type->execute();
                       echo '<label>Produit</label><select name="nom_type" class="form-control" autofocus>';
                            while ($Pr = $type->fetch()) {
                               echo "<option>".$Pr["nom_type"]."</option>";
                            }
                        echo "</select>";

 }
?>