<?php
require_once("Commande.php");
require_once("Produit.php");
require_once("Article_e.php");
$produit = new Produit();
$article = new Article_e();
$commande = new Commande();
$stmt = $commande->afficheCommande();
$stmt->execute();
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
                                <h4 class="title">Remplir Magasin</h4>
                            </div>

                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header text-center">
                                                    <h4 class="title">COMMANDES</h4>
                                                    <br>
                                                </div>
                                                <div class="content table-responsive table-full-width table-upgrade">
                                                    <table class="table">
                                                        <thead>
                                                            <th></th>
                                                            <th class="text-center">Type</th>
                                                            <th class="text-center">Quantite</th>
                                                            <th class="text-center">Etat</th>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                            while($cmd=$stmt->fetch()){?>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <?php
                                                                         if($cmd["id_type"]==NULL){
                                                                             $k="Produit";
                                                                                    $stmt1 = $produit->getInfostype($cmd["id_type_p"]);
                                                                                    $stmt1->execute();
                                                                                    while ($p=$stmt1->fetch())
                                                                                         echo $p["nom_type"];
                                                                    }else{
                                                                             $k="Article";
                                                                             $stmt2 = $article->getInfosType_a($cmd["id_type"]);
                                                                             $stmt2->execute();
                                                                             while ($a=$stmt2->fetch())
                                                                                 echo $a["nom_type"];
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $cmd["quantite"];?></td>
                                                                <td>
                                                                    <?php if($cmd["etat_commande"]==1){  ?>
                                                                      <i class="fa fa-check text-success"></i>
                                                                        <td>
                                                                            <a target="_blank"  class="btn btn-round btn-fill btn-info"onclick="Ajouter_p_a($k,$,)" >Ajouter</a>
                                                                        </td>
                                                                        <?php }
                                                                         else {  ?>

                                                                             <td><i class="fa fa-times text-danger"></i></td>
                                                                             <td></td>
                                                                             <td></td>

                                                                      <?php }?>

                                                                </td>


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
                            <?php require_once("FourmulaireMagasin.php"); ?>
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
