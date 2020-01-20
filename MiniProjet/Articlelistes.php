<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 10%;
    border-collapse:collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 3px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require_once("Type_A.php");
require_once("Article_e.php");
require_once("ConnexionPDO.php");
$a=new Type_A();
$q=intval($_GET['id_type_a']);
$data=$a->connexion->getDataBase();
    
$query="SELECT  * FROM emplacement , article_e  WHERE article_e.id_emplacement=emplacement.id_emplacement and article_e.id_type_a='".$q."'"  ;
$stmt=$data->prepare($query);
$stmt->execute(); ?>

                <select id="id_emplacement" name="id_emplacement" class="form-control">
                    <?php
                      while($row = $stmt->fetch()) { ?>
                          <option value="<?php echo $row['id_emplacement'];?>"><?php echo $row['nom_emplacement'] ;?></option>
                      <?php } ?>
                </select>

</div>
</body>
</html>
