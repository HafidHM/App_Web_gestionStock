<?php
require_once("Fournisseur.php");
$fournisseur = new Fournisseur();
$stmt = $fournisseur->afficherFournisseur();
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
                    <a class="navbar-brand" href="#">Fournisseur</a>
                </div>
                <?php require_once("Notification.php");?>
            </div>
        </nav>


        <div class="content">

            <?php require_once("BarrFonctionForn.html"); ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Afficher Fournisseur</h4>
                            </div>
                                    
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped table-hover ">
                                     <thead style="background-color: black">
                                       <th>ID</th>
                                       <th>Nom</th>
                                       <th>Adresse</th>
                                       <th>Telephone</th>
                                       <th>Date</th>
                                       <th colspan="2">Opération</th>

                                    </thead>

                                    <tbody>    
                                    <?php
                                       while($forn=$stmt->fetch()){?>
                                        <tr>
                                            <td><?php echo $forn["id_fournisseur"];?></td>
                                             <td><?php echo $forn["nom"];?></td>
                                             <td><?php echo $forn["adresse"];?></td>
                                             <td><?php echo $forn["telephone"];?></td>
                                            <td><?php echo $forn["date"];?></td>
                                            
                                             <td><a href="GestionFormulaire.php?operation=supprimerFournisseur&id_fournisseur=<?php echo $forn['id_fournisseur']?>" onclick="return(confirm('Etes-vous sûr de supprimer cet fournisseur?'));"><img src="image/supprimer.png"/></a></td>
                                            
                                             <td><a href="EditerFournisseur.php?id_fournisseur=<?php echo $forn['id_fournisseur']?>"><img src="image/modifier.png"/></a></td>
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
