<?php

class Commander
{
    private $id_type;
    private $id_fournisseur;
    private $id_prduit;
    private $quantite;
    private $prix;

    public function __construct($id_type, $id_fournisseur, $id_prduit, $quantite, $prix)
    {
        $this->id_type = $id_type;
        $this->id_fournisseur = $id_fournisseur;
        $this->id_prduit = $id_prduit;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }

    public function getIdType()
    {
        return $this->id_type;
    }
    public function setIdType($id_type)
    {
        $this->id_type = $id_type;
    }


    public function getIdFournisseur()
    {
        return $this->id_fournisseur;
    }
    public function setIdFournisseur($id_fournisseur)
    {
        $this->id_fournisseur = $id_fournisseur;
    }


    public function getIdPrduit()
    {
        return $this->id_prduit;
    }
    public function setIdPrduit($id_prduit)
    {
        $this->id_prduit = $id_prduit;
    }


    public function getQuantite()
    {
        return $this->quantite;
    }
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }


    public function getPrix()
    {
        return $this->prix;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

}