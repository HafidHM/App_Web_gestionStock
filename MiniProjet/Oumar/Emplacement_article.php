<?php 
require_once("ConnexionPDO.php");
class Emplacement_article{
	private $nom;
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
	
	function get_type(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM type_a";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
	
	function getinfos_emplacement($id_emplacement){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " select etat , nom_type , quantite_e  from article_e , type_a where article_e.id_type = type_a.id_type 
																		and id_emplacement = :id_emplacement  ";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
		return $stmt;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	function getnom_emplacement($id_emplacement){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " select nom  from emplacement where id_emplacement = :id_emplacement  ";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
		return $stmt;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		
		}
	}
	
	
}


?>