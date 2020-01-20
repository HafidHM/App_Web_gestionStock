<?php
require_once("ConnexionPDO.php");
class ClassVerfie
{

    var $connexion;
    function __construct(){
        $this->connexion=new ConnexionPDO();
    }
    function __destruct(){
        $this->connexion->close();
        unset( $this->connexion);
    }
    function getQuantite($id_type_a){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT *FROM type_a WHERE id_type_a = :id_type_a";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getQuantite_p($id_type_p){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT *FROM type_p WHERE id_type_p = :id_type_p";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getQuantiteSupp($id_type_a,$id_emplacement){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT *FROM article_e WHERE article_e.id_type_a='".$id_type_a."' and article_e.id_emplacement='".$id_emplacement."' ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function gettabl($id_emplacement){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT *FROM article_e WHERE article_e.id_emplacement='".$id_emplacement."' ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function gettabl_p($id_emplacement){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT *FROM produit WHERE produit.id_emplacement='".$id_emplacement."' ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getarticle($id_type_a){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT nom_type FROM type_a WHERE type_a.id_type_a='".$id_type_a."' ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getproduit($id_type_p){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT nom_type FROM type_p WHERE type_p.id_type_p='".$id_type_p."' ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getemplacement($id_emplacement){
        try{
            $data=$this->connexion->getDataBase();
            $query ="SELECT nom_emplacement FROM emplacement WHERE emplacement.id_emplacement='".$id_emplacement."' ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function isTypeExist($type,$nom_type){
        try{
            $data=$this->connexion->getDataBase();
            if($type=='Produit')
            {
                $query ="SELECT *FROM type_p WHERE nom_type='".$nom_type."' ";
            }
            else {
                 $query ="SELECT *FROM type_a WHERE nom_type='".$nom_type."' ";
                }
            $stmt=$data->prepare($query);
            $stmt->execute();
            $ligne = $stmt->fetch();
            if($ligne!=null)
            {
                return 1;
            }
            else
            {
                return 0;
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getTypes($nom_type){

    }
}
?>