<?php
/**
 * Created by PhpStorm.
 * User: HAFID MOHAMED
 * Date: 31/03/2018
 * Time: 22:20
 */
require_once("ConnexionPDO.php");
class ClassFornisseur
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
            $query="INSERT INTO fournisseur SET  nom=:nom,adresse=:adresse,telephone=:telephone";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':nom',$nom,PDO::PARAM_STR);
            $stmt->bindParam(':adresse',$adresse,PDO::PARAM_STR);
            $stmt->bindParam(':telephone',$telephone,PDO::PARAM_STR);

            $resultat=$stmt->execute();
            if(!$resultat){
                return 0;
            }else{
                return 1;}
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function supprimerFournisseur($id_fournisseur)
    {
        $data = $this->connexion->getDataBase();
        try {
            $query = "DELETE FROM fournisseur WHERE id_fournisseur=:id_fournisseur";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':id_fournisseur', $id_fournisseur, PDO::PARAM_INT);
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
            $query="SELECT *FROM fournisseur WHERE id_fournisseur=:id_fournisseur";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_fournisseur',$id_fournisseur,PDO::PARAM_INT);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function modifierFournisseur($id_fournisseur,$nom,$adresse,$telephone){

        $data=$this->connexion->getDataBase();
        try{
            $query="UPDATE fournisseur SET nom=:nom,adresse=:adresse,telephone=:telephone WHERE id_fournisseur=:id_fournisseur";
            $data->beginTransaction();
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_fournisseur',$id_fournisseur,PDO::PARAM_INT);
            $stmt->bindParam(':nom',$nom,PDO::PARAM_STR);
            $stmt->bindParam(':adresse',$adresse,PDO::PARAM_STR);
            $stmt->bindParam(':telephone',$telephone,PDO::PARAM_STR);
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


}
?>