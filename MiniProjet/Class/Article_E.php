<?php
class Article_E
{
    private $id_article;
    private $id_type;
    private $id_emplacement;
    private $etat;

    public function __construct($id_article, $id_type, $id_emplacement, $etat)
    {
        $this->id_article = $id_article;
        $this->id_type = $id_type;
        $this->id_emplacement = $id_emplacement;
        $this->etat = $etat;
    }


    public function getIdArticle()
    {
        return $this->id_article;
    }
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }


    public function getIdType()
    {
        return $this->id_type;
    }
    public function setIdType($id_type)
    {
        $this->id_type = $id_type;
    }


    public function getIdEmplacement()
    {
        return $this->id_emplacement;
    }
    public function setIdEmplacement($id_emplacement)
    {
        $this->id_emplacement = $id_emplacement;
    }


    public function getEtat()
    {
        return $this->etat;
    }
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}