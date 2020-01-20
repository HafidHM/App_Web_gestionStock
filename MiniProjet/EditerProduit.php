<?php
require_once("Produit.php");
$produit = new Produit();
$stmt = $produit->afficheEmplacement();
$stmt->execute();
$stmt2 = $produit->afficheEmplacement();
$stmt2->execute();
require_once("Emplacement_article.php");
$emplacement = new Emplacement_article();
$type = $emplacement->get_type_p();
$type->execute();

if(isset($_GET["id_produit"])){
    $stmt1 = $produit->getInfosProduit($_GET["id_produit"]);

    $stmt1->execute();
    $ligne=$stmt1->fetch();
    $nom_type = $ligne["nom_type"];
    $id_emplacement=$ligne["id_emplacement"];
    $id_produit=$ligne["id_produit"];
    $img=$ligne["img"];
}
else {
    echo "impossible de charger les informations";
    $id_emplacement=0;
    $id_produit=0;
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Produit</a>
                </div>
                <?php require_once("Notification.php");?>
            </div>
        </nav>


        <div class="content">
            <?php require_once("BarrFonctionProduit.html"); ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modifier Produit</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="GestionFonctPro.php?operation=modifierProduit&id_produit=<?php echo $_GET["id_produit"]; ?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Type</label>
                                            <input class="form-control" value="<?php echo $nom_type; ?> " disabled>

                                        </div>
                                        <div class="col-md-4">
                                            <label>Emplacement</label>
                                            <?php while ($Ar = $stmt2->fetch()){ if($Ar ["id_emplacement"]==$id_emplacement){?>
                                                <input type="text" class="form-control" value="<?php echo $Ar ["nom_emplacement"];?>" disabled>
                                            <?php }} ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>* Importer Image</label>
                                                <input type="file" class="form-control" name="img" >
                                                <img src="<?php echo 'image/'.$img;?>" height="150" width="150">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
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
                                    <button type="submit" class="btn btn-bm btn-info fa-pull-right">Modifier</button>
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

