<?php

require_once("ConnexionPDO.php");
class Produit
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
            $query="SELECT *FROM emplacement ";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function ajouterProduit($etat,$id_emplacement,$id_type_p,$quantite,$img){
        $data=$this->connexion->getDataBase();
        try{

            $query="SELECT *FROM produit WHERE id_type_p = :id_type_p and id_emplacement = :id_emplacement";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
            $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
            $resultat=$stmt->execute();
            $ligne = $stmt->fetch();

            if ($ligne!=null)
            {
                $quantite_nv = $quantite+$ligne["quantite"];

                $query="Update  produit SET quantite=:quantite WHERE id_type_p = :id_type_p";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':quantite',$quantite_nv,PDO::PARAM_INT);
                $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
                $stmt->execute();
                $query="SELECT *FROM type_p WHERE id_type_p = :id_type_p ";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
                $stmt->execute();
                $ligne = $stmt->fetch();
                $quantite_e=$ligne["quantite_e"];
                $quantite_e = $quantite_e - $quantite;

                $query="update type_p SET quantite_e=:quantite_e where id_type_p = :id_type_p";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_INT);
                $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
                $resultat=$stmt->execute();
            }
            else
            {
                $query="INSERT INTO produit SET etat=:etat,id_emplacement=:id_emplacement,id_type_p=:id_type_p,quantite=:quantite,img=:img";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':etat',$etat,PDO::PARAM_BOOL);
                $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
                $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
                $stmt->bindParam(':quantite',$quantite,PDO::PARAM_INT);
                $stmt->bindParam(':img',$img,PDO::PARAM_STR);
                $stmt->execute();

                $query="SELECT *FROM type_p WHERE id_type_p = :id_type_p ";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
                $stmt->execute();
                $ligne = $stmt->fetch();
                $quantite_e=$ligne["quantite_e"];
                $quantite_e = $quantite_e - $quantite;
                $query="update type_p SET quantite_e=:quantite_e where id_type_p = :id_type_p";
                $stmt=$data->prepare($query);
                $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_INT);
                $stmt->bindParam(':id_type_p',$id_type_p,PDO::PARAM_INT);
                $resultat=$stmt->execute();
            }

            if(!$resultat){
                return 0;
            }
            else{
                return 1;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
   
    function afficherProduit(){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM  emplacement,type_p,produit WHERE  
               produit.id_emplacement=emplacement.id_emplacement and produit.id_type_p=type_p.id_type_p";
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
 function getInfosProduit($id_produit){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM produit,type_p WHERE id_produit='".$id_produit."' and produit.id_type_p=type_p.id_type_p ";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getInfostype($id_type_p){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM type_p WHERE id_type_p='".$id_type_p."'";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function modifierProduit($id_produit,$id_emplacement,$img){

        $data=$this->connexion->getDataBase();
        try{
            $query="update produit SET id_emplacement=:id_emplacement,img=:img where id_produit='".$id_produit."'";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
            $stmt->bindParam(':img',$img,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            if(!$resultat){
                return 0;
            }else{
                return 1;}
        }catch(PDOException $e){
            $data->rollBack();
            echo $e->getMessage();
        }
    }
    function get_type(){
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

}
?>