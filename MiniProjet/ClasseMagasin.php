<?php
require_once("ConnexionPDO.php");
class ClasseMagasin
{
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }

    function afficheMagasin(){
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
    function affiche_Magasin_Produit(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM type_p";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function Ajouter_Article_Produit($type,$nom_type,$quantite_e){

        try{
            if($type=='Article')
            {
                $data=$this->connexion->getDataBase();
                $query="SELECT *FROM type_a WHERE nom_type = :nom_type ";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':nom_type',$nom_type,PDO::PARAM_STR);
                $stmt->execute();
                $ligne = $stmt->fetch();
                $Anciennequantite = $ligne["quantite_e"];
                $quantite_e = $Anciennequantite + $quantite_e;
                $query = " UPDATE type_a SET quantite_e = :quantite_e where nom_type = :nom_type";

            }
            else
            {
                $data=$this->connexion->getDataBase();
                $query="SELECT *FROM type_p WHERE nom_type = :nom_type ";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':nom_type',$nom_type,PDO::PARAM_STR);
                $stmt->execute();
                $ligne = $stmt->fetch();
                $Anciennequantite = $ligne["quantite_e"];
                $quantite_e = $Anciennequantite + $quantite_e;
                $query = " UPDATE type_p SET quantite_e = :quantite_e where nom_type = :nom_type";
            }
            $stmt=$data->prepare($query);
            $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_INT);
            $stmt->bindParam(':nom_type',$nom_type,PDO::PARAM_STR);

            $resultat = $stmt->execute();

            if(!$resultat){
                return 0;
            }else{
                return 1;}
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function  supprimerType($id_type_a)
    {
        $data = $this->connexion->getDataBase();
        try {

            $query = "DELETE FROM type_a WHERE id_type_a = :id_type_a";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            } else {
                return 1;
            }

        } catch (PDOException $e) {
            $data->rollBack();
            echo $e->getMessage();
        }
    }


    function getType($id_type_a){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM type_a WHERE id_type_a = :id_type_a";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function  modifierType($nom_type,$quantite_e,$id_type_a)
    {
        $data = $this->connexion->getDataBase();
        try {
            $query=" UPDATE type_a SET nom_type= :nom_type,quantite_e= :quantite_e where id_type_a= :id_type_a";
            // $data->beginTransaction();
            $stmt=$data->prepare($query);
            $stmt->bindParam(':nom_type',$nom_type,PDO::PARAM_STR);
            $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_STR);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);

            $resultat = $stmt->execute();
            if (!$resultat) {
                return 0;
            } else {
                return 1;
            }

        } catch (PDOException $e) {
            $data->rollBack();
            echo $e->getMessage();
        }
    }


    function AjouterType_a($nom_type){

        $data=$this->connexion->getDataBase();
        try{
            $query="INSERT INTO type_a SET nom_type =:nom_type";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':nom_type',$nom_type,PDO::PARAM_STR);
            $resultat=$stmt->execute();
            if(!$resultat){
                return 0;
            }
            else{
                return 1;}
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }



}