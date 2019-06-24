<?php
//require '../Autoloader.php'; 
//Autoloader::register(); 
class Chambre 
{
    protected $nom_chambre;
    protected $batiment;

    public function __construct($nom_chambre="",$batiment="")
    {
            $this->nom_chambre=$nom_chambre;
            $this->batiment=$batiment;
     }

    /**
     * Get the value of nom_chambre
     */ 
    public function getNom_chambre()
    {
        return $this->nom_chambre;
    }

    /**
     * Set the value of nom_chambre
     *
     * @return  self
     */ 
    public function setNom_chambre($nom_chambre)
    {
        $this->nom_chambre = $nom_chambre;

        return $this;
    }

    /**
     * Get the value of batiment
     */ 
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * Set the value of batiment
     *
     * @return  self
     */ 
    public function setBatiment($batiment)
    {
        $this->batiment = $batiment;

        return $this;
    }
}
