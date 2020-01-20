<?php
require_once("ClasseMagasin.php");
if(isset($_GET["id_type_a"])){
    $Magasin = new ClasseMagasin();
    $stmt = $Magasin->getType($_GET["id_type_a"]);
    $stmt->execute();
    $ligne=$stmt->fetch();
    $id_type_a=$ligne["id_type_a"];
    $nom_type=$ligne["nom_type"];
    $quantite_e=$ligne["quantite_e"];
}
else {
    echo "impossible de charger les informations";
    $id_type_a=0;
    $nom_type="";
    $quantite_e="";
}
?>

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
                    <a class="navbar-brand" href="#">Magasin</a>
                </div>
                <?php require_once("Notification.php");?>
            </div>
        </nav>


        <div class="content">

            <?php require_once("BarrOptionMagasin.html"); ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modifier Magasin</h4>
                            </div>

                            <div class="content">
                                <form id="fournisseur" method="post" action="GestionMagasin.php?operation=modifierType&id_type_a=<?php echo $id_type_a; ?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>* Type</label>
                                            <input type="text" class="form-control" name="nom_type" placeholder="Type" value="<?php echo $nom_type;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>* Quantite</label>
                                                <input type="text" class="form-control" name="quantite_e" placeholder="Quantite" value="<?php echo $quantite_e; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <center> <button type="submit" class="btn btn-info btn-fill">Modifier</button></center>

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
