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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nouveau Type</h4>
                            </div>
                            <?php require_once("FourmulaireType_a.php"); ?>

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
