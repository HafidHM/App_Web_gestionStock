<?php
require_once("ConnexionPDO.php");
class Type_A
{
    private $id_type;
    private $quantite_E;
    private $nom_type_a;

   var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }
	function get_id_type($nom_type){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " select * from type_a where  nom_type = :nom_type ";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':nom_type',$nom_type,PDO::PARAM_STR);
		$stmt->execute();
		$ligne = $stmt->fetch();
		return $ligne["id_type"];
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

}