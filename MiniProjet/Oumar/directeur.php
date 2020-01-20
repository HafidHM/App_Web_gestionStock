<?php
require_once("Emplacement_article.php");
$emplacement = new Emplacement_article();
$stmt = $emplacement->afficheEmplacement();
$stmt->execute();
?>
<!doctype html>
<html lang="en">
<head>

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
						           
							

                        </div>
                    </div>
                </div>
                <?php  require_once("footer.php"); ?>
           </div>

</div>
</body>
   <?php  require_once("Javascript.php"); ?>
</html>
