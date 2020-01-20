<?php
require_once("ClasseMagasin.php");
$Magasin = new ClasseMagasin();
$result = $Magasin->afficheMagasin();
$result->execute();
$result1 = $Magasin->affiche_Magasin_Produit();
$result1->execute();
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
                            <a class="navbar-brand" href="#">Accueil</a>
                        </div>
                        <?php require_once("Notification.php");?>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-5">
                                <div class="card ">
                                    <div class="card-header" style="padding-top: 12px">
                                       <h4 class="card-title" style="text-align: center">Percentage des articles dans le Magasin</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div id="piechart" class="ct-chart ct-perfect-fourth"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card ">
                                    <div class="card-header" style="padding-top: 12px">
                                        <h4 class="card-title" style="text-align: center">Percentage des produits dans le Magasin</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div id="piechart1" class="ct-chart ct-perfect-fourth"></div>
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
