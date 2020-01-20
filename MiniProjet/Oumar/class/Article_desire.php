<?php
require_once("ConnexionPDO.php");
class Article_Desire
{
    private  $id_article_desire;
	var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }
    function afficheEmplacement(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM emplacement";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
	
	function get_last_ligne_atcl_desirer()
	{
		try{
			$data=$this->connexion->getDataBase();
            $query="SELECT max(id_article_desire) FROM article_desire";
            $stmt=$data->prepare($query);
            return $stmt;
			
			}
		catch(PDOException $e){
			echo $e->getMessage();
		}
			
	}
}