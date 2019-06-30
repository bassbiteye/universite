<?php
class Batiment
{
    protected $nom_bat;
    public function __construct($nom_bat)
    { 
        $this->nom_bat=$nom_bat;
    }
    public function getNom_bat()
    {
        return $this->nom_bat;
    }
    public function setNom_bat($nom_bat)
    { 
        $this->nom_bat = $nom_bat;
    }
}
