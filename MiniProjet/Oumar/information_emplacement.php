<?php 
require_once("Emplacement_article.php");
require_once("Avoir.php");
if(isset($_GET["id_emplacement"])){
	$emplacement = new Emplacement_article();
	$av = new Avoir();
    $stmt = $emplacement->getinfos_emplacement($_GET["id_emplacement"]);
    $stmt->execute();
	$stmt2 = $emplacement->getnom_emplacement($_GET["id_emplacement"]);
	$stmt2->execute();
	$nom = $stmt2->fetch();
	
	$stmt3 = $av->get_article_desirer($_GET["id_emplacement"]);
	$stmt3->execute();
	$type = $emplacement->get_type();
	$type->execute();
	
	$nbr = 0;
$globals["etat"]=array("bon","mauvais");
}
else
{
	echo "inpossible",
	$etat = "";
	$nom_type = "";
	$quantite_e = "";
}

?>
<!doctype html>
<html lang="en">
<head>
<!--include CSS-->
	<link rel="stylesheet"  href="includes/css/bootstrap.min.css">
	<link rel="stylesheet"  href="includes/css/ie10-viewport-bug-workaround.css">
	<link rel="stylesheet"  href="includes/css/font-awesome/css/font-awesome.min.css">

	<!--include Javascript-->
	<script src="includes/js/ie-emulation-modes-warning.js"></script>
	<script src="includes/js/jquery.min.js"></script>
	<script src="includes/js/bootstrap.min.js"></script>
	<script src="includes/js/bootstrap.js"></script>
	<script src="includes/js/holder.min.js"></script>
	<script src="includes/js/ie10-viewport-bug-workaround.js"></script>
	<script src="includes/js/jquery-3.3.1.min.map"></script>
	<script src="includes/js/jquery-3.3.1.min.js"></script>
	<script src="includes/js/jquery-3.3.1.js"></script>
	<script src="includes/js/jquery-3.3.0.js"></script>

    <?php  require_once("lienHead.html"); ?>  
</head>
<body>



<div class="wrapper">
            <div class="sidebar" data-color="blue" data-image="assets/bag.jpg">
            <!--

                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag

            -->
                    <?php require_once("BarreOption.html"); ?>
                    	
            </div>
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
                            <a class="navbar-brand" href="#">Aceuil</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-dashboard"></i>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                   <a href="">
                                       Account
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
						<table class=" table table_bordered table-hover">
								<tr  ><th class="text-center" ><?php echo $nom["nom"]  ; ?></th></tr>
								<tr><th>etat</th> <th> article </th> <th>quantite</th></tr>
								<?php
                                    while ($ligne = $stmt->fetch()) { ?>
										<tr><th> <?php echo $globals["etat"][$ligne["etat"]] ; ?> </th> <th> <?php echo $ligne["nom_type"] ; ?> </th> <th> <?php echo $ligne["quantite_e"] ; ?> </th></tr>
                                    <?php } ?>
						</table>
						</br>
						<div class="row">
							<div class="col-sm-4">
							</div>
							<div class="col-sm-3">
								<button id="button_afficher" type="button" class="btn btn-default"> afficher les articles desires </button>
							</div>
							<div class="col-sm-4">
							</div>
						</div>
						<div class="row" id ="bb1">
						<table id ="panel_article_desirer" class=" table table_bordered table-hover">
								<tr><th> article </th> <th>quantite</th> <th>option</th></tr>
								<?php
                                    while ($ligne = $stmt3->fetch()) { ?>
										<tr> <th> <?php echo $ligne["nom_type"] ; ?> </th> <th> <?php echo $ligne["quantite_article_desire"] ; ?>  </th>
										<th> 
										<a href="Gestion.php?operation=supprimer_article_desire&id_emplacement=<?php echo $ligne["id_emplacement"] ; ?>&id_article_desire=<?php echo $ligne["id_article_desire"] ; ?>" 
										onclick="return(confirm('voulez vous supprimer?'));"> <button type="button" class="btn btn-default" > supprimer </button></a>
										</th>
										<th>
											<div class="col-sm-2 modifier  " rel="<?php $nbr++ ; echo $nbr; ?>" >
												<button   id ="modifier" type="button" class="btn btn-default" > modifier </button>
											</div>
											<form id ="modifier" class="form" method="POST" action="Gestion.php?operation=modifier_article_desire&id_emplacement=<?php echo $ligne["id_emplacement"] ; ?>&id_article_desire=<?php echo $ligne["id_article_desire"] ; ?>" >
											<div class="col-sm-2 valider <?php echo $nbr; ?>"  rel="<?php echo $nbr; ?>" >
												<button type="submit" class="btn btn-default" > valider </button>
											</div>
										
											<div class="col-sm-2 quant <?php echo $nbr; ?>"  rel="<?php echo $nbr; ?>" >
												<div  class="form-group">
													<input type="text" id="nom" placeholder="quantite" name="quantite_article_desire_modification" class="form-control" autofocus>
												</div>
											</div>
											</form>
										</th> 
										</tr>
										<?php } ?>
						</table>
						
						</br>
						<form id ="ajout" class="forml" method="POST" action="Gestion.php?operation=ajouter_article_desirer&id_emplacement=<?php echo $_GET["id_emplacement"] ;?>" >
						<div class="form-group ">
							<label for="nom" class="col-sm-1 control-label">ARTICLE DESIRER</label>
								<div class="col-sm-5">
									
									<select  placeholder="article" name="id_type" class="form-control" autofocus>
                                    <?php
                                    while ($Pr = $type->fetch()) { ?>
                                        <option value =" <?php echo $Pr["id_type"]; ?> "> <?php echo $Pr["nom_type"]; ?> </option>
                                    <?php } ?>
                                    </select>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
									<input type="text" id="nom" placeholder="quantite" name="quantite_article_desire" class="form-control" autofocus>
									</div>
								</div>
								<div class="col-sm-3">
								<button type="submit" class="btn btn-default"> ajouter </button>
							</div>
						</div>
						
						</form>
						</br>
						</div>
						
							

                        </div>
                    </div>
                </div>
                <?php  require_once("footer.php"); ?>
           </div>

</div>
<script>
$(function(){
		$('#bb1').hide();
	$('#button_afficher').on('click',function(){
		$('#bb1').toggle(1000);
	});
});

$(function(){
		$('.valider').hide();
		$('.quant').hide();
		var ett = "modifier";
	$('.modifier').on('click',function(){
		var typ = $(this).attr('rel');
		
		$('.'+typ).toggle(200,function(){
			
			if(ett === "modifier"){
			$('.modifier').html(' <button   id ="modifier" type="button" class="btn btn-default" > annuler </button> ',function(){ ett = "ddd"; });
			}else{
			$('.modifier').html(' <button   id ="modifier" type="button" class="btn btn-default" > mokk </button> ');
			}
			
		});
	});
});

</script>

</body>
   <?php  require_once("Javascript.php"); ?>
</html>
