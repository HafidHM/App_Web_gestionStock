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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="header">
                                        <h4 class="title">Emplacement Produit</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p></p>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="text-align: center">
                                    <div class="form-group">
                                        <label>     Emplacement      </label>
                                        <p>
                                            <select  name="id_emplacement" class="form-control" onclick="showUser4(this.value)" autofocus>
                                                <?php
                                                while ($Pr = $stmt->fetch()) { ?>
                                                    <option value="<?php echo $Pr["id_emplacement"];?>"><?php echo $Pr["nom_emplacement"];?></option>
                                                <?php } ?>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content table-responsive table-full-width">
                                        <div id="txtHint2"> </div>
                                    </div>
                                </div>
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
