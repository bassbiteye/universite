<?php

class Loger extends Boursier{

    protected $chambre;
    public function __construct(   
    $matricule = "",
    $nom = "",
    $prenom = "",
    $email = "",
    $telephone = "",
    $datenaissance = "",
    $id_type="",
    $chambre=""
    )
    {
        parent::__construct(
            $matricule,
            $nom,
            $prenom,
            $email,
            $telephone,
            $datenaissance,
            $id_type

        );
        $this->chambre = $chambre;
    }
   

  


    /**
     * Get the value of chambre
     */ 
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * Set the value of chambre
     *
     * @return  self
     */ 
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;

        return $this;
    }
}

?>