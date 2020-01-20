<?php
require_once("Fournisseur.php");
if(isset($_GET["id_fournisseur"])){
    $fournisseur = new Fournisseur();
    $stmt = $fournisseur->getInfosFournisseur($_GET["id_fournisseur"]);
    $stmt->execute();
    $ligne=$stmt->fetch();
    $id_fournisseur=$ligne["id_fournisseur"];
    $nom=$ligne["nom"];
    $adresse=$ligne["adresse"];
    $telephone=$ligne["telephone"];
   
}
else {
    echo "impossible de charger les informations";
    $id_fournisseur=0;
    $nom="";
    $adresse="";
    $telephone="";
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
                                <h4 class="title">Modifier Fournisseur</h4>
                            </div>

                            <div class="content">
                                <form id="fournisseur" method="post" action="GestionFormulaire.php?operation=modifierFournisseur&id_fournisseur=<?php echo $id_fournisseur; ?> " enctype="multipart/form-data">
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>* Nom</label>
                                                <input type="text" class="form-control" name="nom" placeholder="<?php echo $nom; ?>" value="<?php echo $nom; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">* Adresse</label>
                                                <input type="text" class="form-control" name="adresse"  placeholder="<?php echo $adresse; ?>" value="<?php echo $adresse; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>* Telephone</label>
                                                <input type="text" class="form-control" name="telephone"  placeholder="<?php echo $telephone; ?>" value="<?php echo $telephone; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                           <center> <button type="submit" class="btn btn-info btn-fill">Modifier</button></center>

                                    
                                    <div class="clearfix"></div>
                                    
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

