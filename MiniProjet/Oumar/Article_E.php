<?php 
require_once("ConnexionPDO.php");
class Article_E{
	private $nom;
	var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }
	function getinfos_emplacement($id_emplacement){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " select * from emplacement where  reservation_id = :id_emplacement  ";
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