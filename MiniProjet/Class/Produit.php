<?php

require_once("ConnexionPDO.php");
class ClassProduit
{
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
            $query="SELECT *FROM emplacement_article";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function ajouterProduit($id_produit,$nom,$quantite_e,$type_e,$entreprise,$emplacement,$img){
        $data=$this->connexion->getDataBase();
        try{
            $query="INSERT INTO produit SET id_produit=:id_produit,nom=:nom,quantite_e=:quantite_e,type_e=:type_e,entreprise=:entreprise,emplacement=:emplacement,img=:img";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_produit',$id_produit,PDO::PARAM_INT);
            $stmt->bindParam(':nom',$nom,PDO::PARAM_STR);
            $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_INT);
            $stmt->bindParam(':type_e',$type_e,PDO::PARAM_STR);
            $stmt->bindParam(':entreprise',$entreprise,PDO::PARAM_STR);
            $stmt->bindParam(':emplacement',$emplacement,PDO::PARAM_STR);
            $stmt->bindParam(':img',$img,PDO::PARAM_STR);
            $resultat=$stmt->execute();
            if(!$resultat){
                return 0;
            }else{
                return 1;}
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function afficherProduit(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM produit";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function supprimerProduit($id_produit)
    {
        $data = $this->connexion->getDataBase();
        try {
            $query = "DELETE FROM produit WHERE id_produit=:id_produit";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
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


}
?>