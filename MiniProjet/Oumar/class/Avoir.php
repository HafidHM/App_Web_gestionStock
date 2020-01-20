<?php 

require_once("ConnexionPDO.php");
class Avoir{
	private $quantite;
    private  $id_article_desire;
	var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }
	
	
	
}



?>