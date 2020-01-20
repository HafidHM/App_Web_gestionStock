<div class="content">
    <form method="post" action="GestionFormulaire.php?operation=ajouterFournisseur" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" value="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" class="form-control" name="telephone" placeholder="Telephone" value="">
                </div>
            </div>
        </div>
       <center> <button type="submit" class="btn btn-info btn-fill">Ajouter</button></center>
        <div class="clearfix"></div>
        <?php if(isset($_GET["resultat"])) {?>
<?php echo "<font color='green'>".$resultat=($_GET["resultat"]==1)?"Opération est terminée avec succès!" : "une erreur est survenue lors de la derniere operation"."</font>";?>
<?php } ?>
    </form>
</div>
