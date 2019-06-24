
<?php

abstract class Etudiant{
 //   private $id_etudiant;
    private $matricule;
    private $nom ;
    private $prenom ;
    private $email;
    private $telephone ;
    private $datenaissance ;
public function __construct($matricule='',$nom='',$prenom='',$email='',$telephone='',$datenaissance='')
{
    $this->matricule=$matricule;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->email=$email;
    $this->telephone=$telephone;
    $this->datenaissance=$datenaissance;
}
public function getMatricule()
{
    return $this->matricule;
}
public function getNom()
{
    return $this->nom;
}
public function getPrenom()
{
    return $this->prenom;
}
public function getEmail()
{
    return $this->email;
}
public function getTelephone()
{
    return $this->telephone;
}
public function getDatenaissance()
{
    return $this->datenaissance;
}
public function setMatricule($matricule){
    $this->matricule=$matricule;
  }
  public function setNom($nom){
    $this->nom=$nom;
  }
  public function setPrenom($prenom){
    $this->prenom=$prenom;
  }
  public function setEmail($email){
    $this->email=$email;
  }
  public function setTelephone($telephone){
    $this->telephone=$telephone;
  }
  public function setDatenaissance($datenaissance){
    $this->datenaissance=$datenaissance;
  }
 /*  public function infos(){
    return $this->nom. ", ".$this->prenom.", ".$this->email;
} */
}
