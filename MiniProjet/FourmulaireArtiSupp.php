<?php
require_once("Article_e.php");
$article = new Article_e();
$stmt = $article->afficheEmplacement();
$stmt->execute();
require_once("Emplacement_article.php");
$emplacement = new Emplacement_article();
$type = $emplacement->get_type();
$type->execute();
?>

<div class="content">
    <form method="POST" action="GestionFonctArti.php?operation=SupprimQuantArticle" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3">
                <label>Type</label>
                <select  id="id_type_a" name="id_type_a" class="form-control" onclick="showUser1(this.value)" autofocus>
                    <?php
                    while ($Pr = $type->fetch()) { ?>
                        <option value="<?php echo $Pr["id_type_a"];?>"> <?php echo $Pr["nom_type"]; ?> </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Emplacement</label>
                    <div id="txtHint1"> </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Quantite</label>
                    <input type="text" class="form-control" name="quantite"  placeholder="" onkeyup="getResult2(this.value)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <h5><div id="result"></div></h5>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-group-justified-vertical btn-danger ">Supprimer</button>
        <div class="clearfix"></div>
        <?php if(isset($_GET["resultat"])) {?>
            <?php echo "<font color='red'>".$resultat=($_GET["resultat"]==1)?"Opération est terminée avec succès!" : "une erreur est survenue lors de la derniere operation"."</font>";?>
        <?php } ?>
    </form>
</div>

