<?php
require_once("Produit.php");
$produit = new Produit();
$stmt = $produit->afficherProduit();
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Afficher Produit</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead style="background-color: black">
                                    <th><h6>ID</h6></th>
                                    <th><h6>Produit</h6></th>
                                    <th><h6>Etat</h6></th>
                                    <th><h6>Quantite</h6></th>
                                    <th><h6>Emplacement</h6></th>
                                    <th><h6>Img</h6></th>
                                    <th colspan="2"><h6>Operation</h6></th>
                                    </thead>

                                    <tbody>
                                         <?php while ($Pr = $stmt->fetch()) { ?>

                                             <tr>
                                                 <td><h6><?php echo $Pr["id_produit"];?></h6></td>
                                                 <td><h6><?php echo $Pr["nom_type"];?></h6></td>
                                                 <td><h6>
                                                     <?php
                                                     if ($Pr["etat"]==1)
                                                         echo "bon";
                                                     else
                                                         echo "mauvais";
                                                     ?>
                                                     </h6>
                                                 </td>
                                                 <td><h6><?php echo $Pr["quantite"];?></h6></td>
                                                 <td><h6><?php echo $Pr["nom_emplacement"];?></h6></td>
                                                 <td><h6> <img src="image/<?php echo $Pr["img"];?>" width="100" height="100"></h6></td>
                                                 <td><a href="GestionFonctPro.php?operation=supprimerProduit&amp;id_produit=<?php echo $Pr['id_produit']?>" onclick="return(confirm('Etes-vous sûr de supprimer <?php echo $Pr["nom"];?> ?'));"><img src="image/supprimer.png"/></a></td>
                                                 <td><a href="EditerProduit.php?&amp;id_produit=<?php echo $Pr['id_produit']?>"><img src="image/modifier.png"/></a></td>
                                            </tr>
                                         <?php }  ?>
                                   
                                    </tbody>
                                </table>
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