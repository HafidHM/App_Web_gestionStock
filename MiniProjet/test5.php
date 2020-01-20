<?php
require_once("ClassVerfie.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
$Verification = new ClassVerfie();
$type= $_REQUEST["valeur1"];
$nom_type= $_REQUEST["valeur"];
$stmt = $Verification->isTypeExist($type,$nom_type);
if ($stmt==0)
{
    echo "<div style='color: green'> OK </div>";
}
else{
    echo "<div style='color: red;'> Attention !! Ce type existe deja </div>";
}

?>