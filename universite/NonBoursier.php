<?php

class NonBoursier extends Etudiant
{
    protected $adresse;
    
    public function __construct(
        $matricule = "",
        $nom = "",
        $prenom = "",
        $email = "",
        $telephone = "",
        $datenaissance = "",
        $adresse = ""
       
    ) {

        parent::__construct(
            $matricule,
            $nom,
            $prenom,
            $email,
            $telephone,
            $datenaissance
            

        );
        $this->adresse = $adresse;
        
    }
    
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

  
}
