<?php

require_once("ConnexionPDO.php");
class Fournisseur
{
    var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }

    function ajouterFournisseur($nom,$adresse,$telephone){
        $data=$this->connexion->getDataBase();
        try{
            $query="INSERT INTO fournisseur SET  nom=:nom,adresse=:adresse,telephone=:telephone,date=NOW()";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':nom',$nom,PDO::PARAM_STR);
            $stmt->bindParam(':adresse',$adresse,PDO::PARAM_STR);
            $stmt->bindParam(':telephone',$telephone,PDO::PARAM_STR);
            $resultat=$stmt->execute();
            if(!$resultat){
                return 0;
            }else{
                $evenement = "Un Fournisseur est ajoute de nom: ".$nom;
                $query="INSERT INTO journal SET  evenement=:evenement";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':evenement',$evenement,PDO::PARAM_STR);
                $stmt->execute();
                return 1;}
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function supprimerFournisseur($id_fournisseur)
    {
        $data = $this->connexion->getDataBase();
        try {
            $query = "DELETE FROM fournisseur WHERE id_fournisseur = :id_fournisseur";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':id_fournisseur', $id_fournisseur, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            } else {
                $evenement = "Un Fournisseur est Supprimer d'ID: ".$id_fournisseur;
                $query="INSERT INTO journal SET  evenement=:evenement";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':evenement',$evenement,PDO::PARAM_STR);
                $stmt->execute();
                return 1;
            }
        } catch (PDOException $e) {
            $data->rollBack();
            echo $e->getMessage();
        }
    }
    function afficherFournisseur(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM fournisseur";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    function getInfosFournisseur($id_fournisseur){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM fournisseur WHERE id_fournisseur = :id_fournisseur";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_fournisseur',$id_fournisseur,PDO::PARAM_INT);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    function modifierFournisseur($nom,$adresse,$telephone,$id_fournisseur){
        var_dump($nom);
        var_dump($adresse);
        var_dump($telephone);
        var_dump($id_fournisseur);
        $data=$this->connexion->getDataBase();
        try{
            $query=" UPDATE fournisseur SET nom= :nom,adresse= :adresse,telephone= :telephone where id_fournisseur= :id_fournisseur";
           // $data->beginTransaction();
            $stmt=$data->prepare($query);
            $stmt->bindParam(':nom',$nom,PDO::PARAM_STR);
            $stmt->bindParam(':adresse',$adresse,PDO::PARAM_STR);
            $stmt->bindParam(':telephone',$telephone,PDO::PARAM_STR);
                        $stmt->bindParam(':id_fournisseur',$id_fournisseur,PDO::PARAM_INT);

            $resultat = $stmt->execute();
            if(!$resultat){
                return 0;
            }else{
                $evenement = "Un Fournisseur ".$nom." est modifie";
                $query="INSERT INTO journal SET  evenement=:evenement";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':evenement',$evenement,PDO::PARAM_STR);
                $stmt->execute();
                return 1;}
        }catch(PDOException $e){
            $data->rollBack();
            echo $e->getMessage();
        }
    }
}
?>