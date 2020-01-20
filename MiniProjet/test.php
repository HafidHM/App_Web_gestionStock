
<?php
require_once("ClassVerfie.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
$Verification = new ClassVerfie();
$quantite_ss= $_REQUEST["valeur"];
$id_type_a= $_REQUEST["valeur1"];
$stmt = $Verification->getQuantite($id_type_a);
$stmt->execute();

while ($Pr = $stmt->fetch()) {
    $quantite_bb=$Pr["quantite_e"];
}
if ($quantite_ss<=$quantite_bb)
{
    echo "<div style='color: green'> OK </div>";
}
else{
    echo "<div style='color: red;'> Attention !! superieur a la Capacite dans l'emplacement</div>";
}
unset($Verification);
?>