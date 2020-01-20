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
	
	function get_article_desirer($id_emplacement){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " select * from avoir , article_desire , type_a where avoir.id_article_desire = article_desire.id_article_desire
																 and article_desire.id_type = type_a.id_type
																 and id_emplacement = :id_emplacement  ";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
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
	
	function ajouter_article_desirer($id_type,$id_emplacement,$quantite_article_desire)
	{
		try{
		
		   
			$data=$this->connexion->getDataBase();
				$query="SELECT * FROM article_desire , avoir 
															where article_desire.id_article_desire = avoir.id_article_desire 
															and id_type = :id_type and id_emplacement = :id_emplacement ";
				$stmt=$data->prepare($query);
				$stmt->bindParam(':id_type',$id_type,PDO::PARAM_INT);
				$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
				$stmt->execute();
				$ligne = $stmt->fetch();
				$id_article_desire = $ligne["id_article_desire"];
				
				$data=$this->connexion->getDataBase();
				$query="SELECT * FROM avoir where 
											    id_emplacement = :id_emplacement 
											and id_article_desire = :id_article_desire";
				$stmt=$data->prepare($query);
				$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
				$stmt->bindParam(':id_article_desire',$id_article_desire,PDO::PARAM_INT);
				$stmt->execute();
				$ligne1 = $stmt->fetch();
			
			
			$data =  $this->connexion->getDataBase();
			if($ligne1["quantite_article_desire"]==null)
			{
				
				$data =  $this->connexion->getDataBase();
				$query = " INSERT INTO article_desire SET  id_type = :id_type	";								
				$stmt = $data->prepare($query);
				$stmt->bindParam(':id_type',$id_type,PDO::PARAM_INT);
				$resultat = $stmt->execute();
				if(!$resultat)
					$drp1 = 0;
				else
					$drp1 = 2;
				
				$data=$this->connexion->getDataBase();
				$query="SELECT max(id_article_desire) FROM article_desire";
				$stmt=$data->prepare($query);
				$stmt->execute();
				$ligne = $stmt->fetch();
				$id_article_desire = $ligne["max(id_article_desire)"];
				
				$query = " INSERT INTO avoir SET
												id_emplacement = :id_emplacement,
												id_article_desire = :id_article_desire,
												quantite_article_desire = :quantite_article_desire
												";
				$stmt = $data->prepare($query);
				$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
			}
			else{
				$query = " update avoir SET
										quantite_article_desire = :quantite_article_desire
										where id_article_desire = :id_article_desire";
				$quantite_article_desire = $quantite_article_desire + $ligne1["quantite_article_desire"];
				$stmt = $data->prepare($query);
			}									
		
		$stmt->bindParam(':id_article_desire',$id_article_desire,PDO::PARAM_INT);
		$stmt->bindParam(':quantite_article_desire',$quantite_article_desire,PDO::PARAM_INT);
		$resultat = $stmt->execute();
		if(!$resultat)
			$drp = 0;
		else
			$drp = 1;
		
		return $drp + $drp1 ;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	
	}
	
	function supprimer_article_desire($id_emplacement,$id_article_desire){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " delete from avoir where id_emplacement = :id_emplacement
									 and id_article_desire = :id_article_desire";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
		$stmt->bindParam(':id_article_desire',$id_article_desire,PDO::PARAM_INT);
		$resultat = $stmt->execute();
		if(!$resultat)
			$drp = 0;
		else
			$drp = 1;
		
		$data =  $this->connexion->getDataBase();
		$query = " delete from article_desire where id_article_desire = :id_article_desire";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':id_article_desire',$id_article_desire,PDO::PARAM_INT);
		$resultat = $stmt->execute();
		if(!$resultat)
			$drp1 = 0;
		else
			$drp1 = 2;
		
		return $drp1 + $drp;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	function modifier_article_desire($id_emplacement,$id_article_desire,$quantite_article_desire){
		try{
		$data =  $this->connexion->getDataBase();
		$query = " update avoir SET
										quantite_article_desire = :quantite_article_desire
										where id_article_desire = :id_article_desire and id_emplacement = :id_emplacement ";
		$stmt = $data->prepare($query);
		$stmt->bindParam(':id_article_desire',$id_article_desire,PDO::PARAM_INT);
		$stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
		$stmt->bindParam(':quantite_article_desire',$quantite_article_desire,PDO::PARAM_INT);
		$resultat = $stmt->execute();
		if(!$resultat)
			return 0;
		else
			return 1;
		
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		
	}
	
}



?>