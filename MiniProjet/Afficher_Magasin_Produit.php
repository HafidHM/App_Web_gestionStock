<?php
require_once("ClasseMagasin.php");
$Magasin = new ClasseMagasin();
$stmt = $Magasin->affiche_Magasin_Produit();
$stmt->execute();
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Produits</h4>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped table-hover ">
                                    <thead style="background-color: black">
                                    <th>Type</th>
                                    <th>Quantite</th>
                                    <th colspan="2">Opération</th>

                                    </thead>

                                    <tbody>
                                    <?php
                                    while($Mag=$stmt->fetch()){?>
                                        <tr>
                                            <td><?php echo $Mag["nom_type"];?></td>
                                            <td><?php echo $Mag["quantite_e"];?></td>
                                            <td><a href="GestionMagasin.php?operation=supprimerType&id_type_a=<?php echo $Mag['id_type_a']?>" onclick="return(confirm('Etes-vous sûr de supprimer ce Type ?'));"><img src="image/supprimer.png"/></a></td>

                                            <td><a href="EditerMagasin.php?id_type_a=<?php echo $Mag['id_type_a']?>"><img src="image/modifier.png"/></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
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
