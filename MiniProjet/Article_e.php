<?php

require_once("ConnexionPDO.php");
class Article_e
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
    function ajouterArticle($etat,$id_emplacement,$id_type_a,$quantite,$img){
        $data=$this->connexion->getDataBase();
        try{

            $query="SELECT *FROM article_e WHERE id_type_a = :id_type_a and id_emplacement = :id_emplacement";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
            $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
            $resultat=$stmt->execute();
            $ligne = $stmt->fetch();

          if ($ligne!=null)
          {
                  $quantite_nv = $quantite+$ligne["quantite"];

              $query="Update  article_e SET quantite=:quantite WHERE id_type_a = :id_type_a";
              $stmt=$data->prepare($query);
              $stmt->bindParam(':quantite',$quantite_nv,PDO::PARAM_INT);
              $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
              $stmt->execute();
              $query="SELECT *FROM type_a WHERE id_type_a = :id_type_a ";
              $stmt=$data->prepare($query);
              $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
              $stmt->execute();
              $ligne = $stmt->fetch();
              $quantite_e=$ligne["quantite_e"];
              $quantite_e = $quantite_e - $quantite;

              $query="update type_a SET quantite_e=:quantite_e where id_type_a = :id_type_a";
              $stmt=$data->prepare($query);
              $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_INT);
              $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
              $resultat=$stmt->execute();
          }
          else
          {
              $query="INSERT INTO article_e SET etat=:etat,id_emplacement=:id_emplacement,id_type_a=:id_type_a,quantite=:quantite,img=:img";
              $stmt=$data->prepare($query);
              $stmt->bindParam(':etat',$etat,PDO::PARAM_BOOL);
              $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
              $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
              $stmt->bindParam(':quantite',$quantite,PDO::PARAM_INT);

              $stmt->bindParam(':img',$img,PDO::PARAM_STR);
              $stmt->execute();

              $query="SELECT *FROM type_a WHERE id_type_a = :id_type_a ";
              $stmt=$data->prepare($query);
              $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
              $stmt->execute();
              $ligne = $stmt->fetch();
              $quantite_e=$ligne["quantite_e"];
              $quantite_e = $quantite_e - $quantite;
              $query="update type_a SET quantite_e=:quantite_e where id_type_a = :id_type_a";
              $stmt=$data->prepare($query);
              $stmt->bindParam(':quantite_e',$quantite_e,PDO::PARAM_INT);
              $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
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

    function afficherArticle(){
        try{

            $data=$this->connexion->getDataBase();
            $query="select * from  emplacement ,article_e, type_a where
article_e.id_emplacement=emplacement.id_emplacement and article_e.id_type_a=type_a.id_type_a";
            $stmt=$data->prepare($query);
            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function supprimerArticle($id_article_e)
    {
        $data = $this->connexion->getDataBase();
        try {
            $query = " DELETE FROM article_e
                         WHERE id_article_e= :id_article_e ";
            $stmt = $data->prepare($query);

            $stmt->bindParam(':id_article_e',$id_article_e,PDO::PARAM_INT);
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


 function getInfosArticle($id_article_e){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM article_e WHERE id_article_e = :id_article_e";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_article_e',$id_article_e,PDO::PARAM_INT);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function modifierArticle($id_article_e,$id_emplacement,$img){

        $data=$this->connexion->getDataBase();
        try{
           $query="update  article_e SET id_emplacement=:id_emplacement,img=:img where id_article_e='".$id_article_e."'";
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
    function  SupprimQuantArticle($id_emplacement,$id_type_a,$quantite)
    {
        $data = $this->connexion->getDataBase();
        try {

            $query="SELECT *FROM article_e  WHERE id_type_a=:id_type_a
                        and id_emplacement=:id_emplacement";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
            $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
            $stmt->execute();
            $ligne = $stmt->fetch();
            $quantite_e=$ligne["quantite"];
            $quantite_e = $quantite_e - $quantite;

            $query="update article_e SET quantite = :quantite where id_type_a = :id_type_a and id_emplacement = :id_emplacement";
            $stmt=$data->prepare($query);
            $stmt->bindParam(':quantite',$quantite_e,PDO::PARAM_INT);
            $stmt->bindParam(':id_type_a',$id_type_a,PDO::PARAM_INT);
            $stmt->bindParam(':id_emplacement',$id_emplacement,PDO::PARAM_INT);
            $resultat=$stmt->execute();

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
    function getInfosType_a($id_type){
        try{
            $data=$this->connexion->getDataBase();
            $query="SELECT *FROM type_a WHERE id_type_a='".$id_type."'";
            $stmt=$data->prepare($query);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


}
?>