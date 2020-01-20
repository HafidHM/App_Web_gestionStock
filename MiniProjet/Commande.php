<?php

require_once("ConnexionPDO.php");
class Commande
{
    var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }
    function afficheCommande(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM Commander ";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }


}
?>