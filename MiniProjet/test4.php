<?php
require_once("ClassVerfie.php");
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
$Verification = new ClassVerfie();
$id_emplacement = $_REQUEST["valeur"];
$stmt = $Verification->gettabl_p($id_emplacement);
$stmt->execute();
$stmt2 = $Verification->getemplacement($id_emplacement);
$stmt2->execute();
$Pr3 = $stmt2->fetch();
echo "<div class=\"content table-responsive table-full-width\">
             <table class=\"table table-striped table-hover \">
                         <thead style=\"background-color: dimgrey\">
                                 <th style='color: white' colspan='2'>".$Pr3["nom_emplacement"]."</th>
                                
                         </thead>
                         <tbody>                        
                            <tr>
                            <th>Produit</th> 
                            <th>Quantite</th>
                            </tr>";

while ($Pr = $stmt->fetch()) {
    $id_type_p=$Pr["id_type_p"];
    $stmt1 = $Verification->getproduit($id_type_p);
    $stmt1->execute();
    while ($Pr2 = $stmt1->fetch()){
        echo "<tr>";
        echo "<td>" . $Pr2["nom_type"] . "</td>";
        echo "<td>" . $Pr["quantite"] . "</td>";
        echo "</tr>";
    }
}
echo "</tbody>
</table>";
unset($Verification);
?>