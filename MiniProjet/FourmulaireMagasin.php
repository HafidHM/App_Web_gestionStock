<div class="content">
    <form method="post" action="GestionMagasin.php?operation=Ajouter_Article_Produit" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3">
                <label>Type</label>
                <select  id="type" name="type" class="form-control" onclick="showUser3(this.value)" autofocus>
                        <option>Produit</option>
                        <option>Article</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <h5><div id="txtHint"></div></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quantite</label>
                    <input type="text" class="form-control" name="quantite_e" placeholder="Quantite">
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