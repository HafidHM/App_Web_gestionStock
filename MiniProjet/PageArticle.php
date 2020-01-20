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
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Article</a>
                </div>
                <?php require_once("Notification.php");?>
            </div>
        </nav>
        <div class="content">
            <?php require_once("BarrFonctionArticle.html"); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ajouter Article</h4>
                            </div>
                            <?php require_once("FourmulaireArti.php"); ?>
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
