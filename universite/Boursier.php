<?php

class Boursier extends Etudiant
{

protected $id_type;

    public function __construct(
        $matricule = "",
        $nom = "",
        $prenom = "",
        $email = "",
        $telephone = "",
        $datenaissance = "",
        $id_type=""

    ) {

        parent::__construct(
            $matricule,
            $nom,
            $prenom,
            $email,
            $telephone,
            $datenaissance
        
        );
       
        
        $this->id_type = $id_type;
    }


/**
 * Get the value of id_type
 */ 
public function getId_type()
{
return $this->id_type;
}

/**
 * Set the value of id_type
 *
 * @return  self
 */ 
public function setId_type($id_type)
{
$this->id_type = $id_type;

return $this;
}
}
