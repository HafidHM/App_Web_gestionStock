<?php
require_once("Article_e.php");
$article = new Article_e();
$stmt = $article->afficheEmplacement();
$stmt->execute();
$stmt2 = $article->afficheEmplacement();
$stmt2->execute();
require_once("Emplacement_article.php");
$emplacement = new Emplacement_article();
$type = $emplacement->get_type();
$type->execute();

if(isset($_GET["id_article_e"])){
    $stmt1 = $article->getInfosArticle($_GET["id_article_e"]);
    $stmt1->execute();
    $ligne=$stmt1->fetch();
    $id_emplacement=$ligne["id_emplacement"];
    $id_type_a=$ligne["id_type_a"];
    $img=$ligne["img"];
}
else {
    echo "impossible de charger les informations";
    $id_emplacement=0;
    $id_type_a=0;
    $img='';
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php require_once("lienHead.html"); ?>
</head>
<body>
<div class="wrapper">
    <?php require_once("ColeurPage.php"); ?>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Article</a>
                </div>
                <?php require_once("Notification.php");?>
            </div>
        </nav>
        <div class="content">
            <?php require_once("BarrFonctionArticle.html"); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modifier Article</h4>
                            </div>
                            <div class="content">
                                <form method="POST"   action="GestionFonctArti.php?operation=modifierArticle&id_article_e=<?php echo $_GET["id_article_e"]; ?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                                 <label>Type</label>
                                                <?php while ($Pr = $type->fetch()) {  if ($Pr["id_type_a"]==$id_type_a){?>
                                                    <input class="form-control" value="<?php echo $Pr["nom_type"]; ?> " disabled>
                                                <?php }} ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Emplacement</label>
                                            <?php while ($Ar = $stmt2->fetch()){ if($Ar ["id_emplacement"]==$id_emplacement){?>
                                              <input type="text" class="form-control" name="img" placeholder="" value="<?php echo $Ar ["nom_emplacement"];?>" disabled>
                                            <?php }} ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>* Importer Image</label>
                                                <input type="file" class="form-control" name="img" placeholder="">
                                                <img src="<?php echo 'image/'.$img;?>" height="150" width="150">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>* Emplacement</label>
                                                <p>
                                                    <select  name="id_emplacement"  class="form-control" autofocus>
                                                        <?php while ($Ar = $stmt->fetch()){?>
                                                            <option value="<?php echo $Ar["id_emplacement"];?>"> <?php echo $Ar["nom_emplacement"]; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-group-vertical btn-fill pull-right">Modifier</button>
                                    <div class="clearfix"></div>
                                    <?php if(isset($_GET["resultat"])) {?>
                                        <?php echo "<font color='green'>".$resultat=($_GET["resultat"]==1)?"Opération est terminée avec succès!" : "une erreur est survenue lors de la derniere operation"."</font>";?>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("footer.php"); ?>
    </div>

</div>
</body>
<?php require_once("Javascript.php"); ?>
</html>
