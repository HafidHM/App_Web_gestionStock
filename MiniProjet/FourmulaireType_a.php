<div class="content">
    <form method="post" action="GestionMagasin.php?operation=AjouterType_a" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-3">
                <label>Type</label>
                <select  id="type" name="type" class="form-control" autofocus>
                    <option>Produit</option>
                    <option>Article</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nouveau Type</label>
                    <input type="text" class="form-control" name="nom_type" placeholder="Nouveau Type"  onkeyup="getResult4(this.value)" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label></label>
                    <h5><div id="result"></div></h5>
                </div>
            </div>

        </div>



        <center> <button type="submit" class="btn btn-default btn-fill">Ajouter</button></center>
        <div class="clearfix"></div>
        <?php if(isset($_GET["resultat"])) {?>
            <?php echo "<font color='green'>".$resultat=($_GET["resultat"]==1)?"Opération est terminée avec succès!" : "une erreur est survenue lors de la derniere operation"."</font>";?>
        <?php } ?>
    </form>
</div>