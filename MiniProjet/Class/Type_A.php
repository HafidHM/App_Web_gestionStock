<?php

class Type_A
{
    private $id_type;
    private $quantite_E;
    private $nom_type_a;

    public function __construct($id_type, $quantite_E, $nom_type_a)
    {
        $this->id_type = $id_type;
        $this->quantite_E = $quantite_E;
        $this->nom_type_a = $nom_type_a;
    }


    public function getIdType()
    {
        return $this->id_type;
    }
    public function setIdType($id_type)
    {
        $this->id_type = $id_type;
    }

    public function getQuantiteE()
    {
        return $this->quantite_E;
    }
    public function setQuantiteE($quantite_E)
    {
        $this->quantite_E = $quantite_E;
    }


    public function getNomTypeA()
    {
        return $this->nom_type_a;
    }
    public function setNomTypeA($nom_type_a)
    {
        $this->nom_type_a = $nom_type_a;
    }


}