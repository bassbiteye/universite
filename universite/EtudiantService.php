<?php


class EtudiantService
{
  private $db_name;
  private $db_user;
  private $db_pass;
  private $db_host;
  private $pdo;

  public function __construct($db_name = 'universite', $db_user = 'test', $db_pass = 'test', $db_host = 'localhost')
  {
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_host = $db_host;
  }

    

  public function getPDO()
  {
    if ($this->pdo === null) {
      $pdo = new PDO('mysql:dbname=universite;host=localhost', 'test', 'test');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    }
    return $this->pdo;
  }
  public function   findAllc()
  {
    $req = $this->getPDO()->query("SELECT c.id_chambre, c.nom_chambre ,b.nom_bat,b.id_batiment FROM chambre c,batiment  b where c.id_batiment=b.id_batiment  ORDER BY c.id_batiment ASC");
    return $req->fetchAll(PDO::FETCH_OBJ);
  }

  public function   findAll($table)
  {
    $req = $this->getPDO()->query("SELECT * FROM $table ");
    return $req->fetchAll(PDO::FETCH_OBJ);
  }

  public function   findval($col,$val)
  {
   
    $req = $this->getPDO()->query("SELECT * FROM Etudiant  where " .$col ." = "."'$val'");
   
    return $req->fetchAll(PDO::FETCH_OBJ);
  }
  //etudiant
  function getidEtu()
  {

    $req = $this->getPDO()->query("SELECT * FROM Etudiant where id_etudiant = (SELECT MAX(id_etudiant) FROM Etudiant)");
    return $req->fetchAll(PDO::FETCH_OBJ);
  }
  public function   getChambreByBAT($id)
  {
    $req = $this->getPDO()->query("SELECT * FROM chambre where id_batiment= '$id' ");
    $chambre = $req->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($chambre);
  }
  public function   add(Etudiant $etudiant)
  {
    $matricule = $etudiant->getMatricule();
    $nom = $etudiant->getNom();
    $prenom = $etudiant->getPrenom();
    $email = $etudiant->getEmail();
    $tel = $etudiant->getTelephone();
    $date = $etudiant->getDatenaissance();

    $statement = $this->getPDO()->prepare("INSERT INTO Etudiant (matricule,nom,prenom,email,telephone,date_naissance )
     VALUES (:matricule,:nom, :prenom,:email,:telephone,:date_naissance)");
    $statement->execute(array(
      'matricule' => $matricule, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email,
      'telephone' => $tel, 'date_naissance' => $date
    ));
    $req = $this->getPDO()->query("SELECT * FROM Etudiant WHERE matricule = '$matricule'");
    while ($etu = $req->fetch()) {
      $id_etudiant = $etu['id_etudiant'];
    }
    if (get_class($etudiant) == 'Boursier' || get_class($etudiant) == 'Loger') {
      $id_type = $etudiant->getId_type();
      //var_dump($id_etudiant);
      $statement = $this->getPDO()->prepare("INSERT INTO boursier (id_etudiant,id_type )
      VALUES (:id_etudiant,:id_type)");
      $statement->execute(array('id_etudiant' => $id_etudiant, 'id_type' => $id_type));
      if (get_class($etudiant) == 'Loger') {
        $chambre = $etudiant->getChambre();

        // var_dump($chambre);
        $statement = $this->getPDO()->prepare("INSERT INTO loger (id_etudiant,id_chambre)
        VALUES (:id_etudiant,:id_chambre)");
        $statement->execute(array('id_etudiant' => $id_etudiant, 'id_chambre' => $chambre));
      }
    } else if (get_class($etudiant) == 'NonBoursier') {
      $adresse = $etudiant->getAdresse();

      // var_dump($id_etudiant);
      $statement = $this->getPDO()->prepare("INSERT INTO non_boursier (id_etudiant,adresse )
      VALUES (:id_etudiant,:adresse)");
      $statement->execute(array('id_etudiant' => $id_etudiant, 'adresse' => $adresse));
    }
  }
public function editE(Etudiant $etudiant,$id){


  $matricule = $etudiant->getMatricule();
  $nom = $etudiant->getNom();
  $prenom = $etudiant->getPrenom();
  $email = $etudiant->getEmail();
  $tel = $etudiant->getTelephone();
  $date = $etudiant->getDatenaissance();
  $sql = "UPDATE Etudiant
  SET nom = '$nom',prenom='$prenom',email='$email',telephone='$tel',date_naissance='$date' 
  WHERE id_etudiant='$id'";


 // Prepare statement
 $req = $this->getPDO()->prepare($sql);

 // execute the query
 $req->execute();

}
public function deleteE($id)
{
  // sql to delete a record
  $req = "DELETE FROM Etudiant WHERE id_etudiant='$id'";

  // use exec() because no results are returned
  $req = $this->getPDO()->exec($req);

  //if($req)
  //echo 'suppression reuissit';
  // return $id;
}
  public function   findE($colonne)
  {
    $resultat = $this->getPDO()->query("SELECT * FROM Etudiant 
    where  matricule ='$colonne' 
    or nom ='$colonne'
    or prenom ='$colonne'
    or email ='$colonne' 
    or telephone ='$colonne' 
    or date_naissance ='$colonne' ");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  //find etudiant
  public function   NonBoursier()
  {

    $resultat = $this->getPDO()->query("SELECT e.matricule as mat,e.nom as nom
  ,e.prenom as prenom ,e.email as email,e.telephone as telephone ,
  e.date_naissance as date_naissance ,n.adresse  as adresse
   FROM Etudiant e,non_boursier n
    where  e.id_etudiant =n.id_etudiant");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  public function loger()
  {
    $resultat = $this->getPDO()->query("SELECT  DISTINCT Etudiant.matricule as mat,
  Etudiant.nom as nom, Etudiant.prenom as prenom,
  Etudiant.telephone as telephone , Etudiant.email as email,
  Etudiant.date_naissance as date_naissance, 
  type.libelle  as type_bourse,
   type.montant as montant, chambre.nom_chambre as chambre, batiment.nom_bat as batiment
 FROM Etudiant, type, loger, chambre, batiment, boursier
WHERE Etudiant.id_etudiant = boursier.id_etudiant
AND loger.id_etudiant=boursier.id_etudiant
AND type.id_type=boursier.id_type
AND loger.id_chambre=chambre.id_chambre
AND chambre.id_batiment=batiment.id_batiment ");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  public function boursier()
  {
    $resultat = $this->getPDO()->query("SELECT e.matricule as mat,e.nom as nom
  ,e.prenom as prenom ,e.email as email,e.telephone as telephone ,
  e.date_naissance as date_naissance,t.libelle as libelle,t.montant  
  FROM Etudiant e,boursier b,type t 
   where e.id_etudiant =b.id_etudiant and t.id_type=b.id_type");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  ///check status
  public function   checkBoursier($matriclue)
  {
    $resultat = $this->getPDO()->query("SELECT e.matricule as mat,e.nom as nom
    ,e.prenom as prenom ,e.email as email,e.telephone as telephone ,
    e.date_naissance as date_naissance,t.libelle as libelle,t.montant  
    FROM    Etudiant e,boursier b,type t 
     where e.matricule ='$matriclue' and e.id_etudiant =b.id_etudiant and t.id_type=b.id_type");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  public function   checkLoger($matriclue)
  {
    $resultat = $this->getPDO()->query("SELECT  DISTINCT Etudiant.matricule as mat,
    Etudiant.nom as nom, Etudiant.prenom as prenom,
    Etudiant.telephone as telephone , Etudiant.email as email,
    Etudiant.date_naissance as date_naissance, 
    type.libelle  as type_bourse,
     type.montant as montant, chambre.nom_chambre as chambre, batiment.nom_bat as batiment
   FROM Etudiant, type, loger, chambre, batiment, boursier
  WHERE  Etudiant.matricule ='$matriclue' and  Etudiant.id_etudiant = boursier.id_etudiant
  AND loger.id_etudiant=boursier.id_etudiant
  AND type.id_type=boursier.id_type
  AND loger.id_chambre=chambre.id_chambre
  AND chambre.id_batiment=batiment.id_batiment ");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  public function   checkNonBoursier($matriclue)
  {
    $resultat = $this->getPDO()->query("SELECT e.matricule as mat,e.nom as nom
    ,e.prenom as prenom ,e.email as email,e.telephone as telephone ,
    e.date_naissance as date_naissance ,n.adresse  as adresse
     FROM Etudiant e,non_boursier n
      where  e.matricule ='$matriclue' and e.id_etudiant =n.id_etudiant");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
  //type
  public function   addType(Type $type)
  {
    $libelle = $type->getLibelle();
    $montant = $type->getMontant();

    $statement = $this->getPDO()->prepare("INSERT INTO 
    type (libelle,montant)
    VALUES (:libelle,:montant)");
    $statement->execute(array('libelle' => $libelle, 'montant' => $montant));
    return $statement;
  }
  public function editType(Type $type, $id)
  {
    $libelle = $type->getLibelle();
    $montant = $type->getMontant();

    $sql = "UPDATE type
     SET libelle = '$libelle',montant='$montant'
     WHERE id_type='$id'";
    var_dump($sql);

    // Prepare statement
    $req = $this->getPDO()->prepare($sql);

    // execute the query
    $req->execute();
  }
  public function deleteType($id)
  {
    // sql to delete a record
    $req = "DELETE FROM type WHERE id_type='$id'";

    // use exec() because no results are returned
    $req = $this->getPDO()->exec($req);

   
  }
  //chambre
  public function   addChambre(Chambre $chambre)
  {
    $nom = $chambre->getNom_chambre();
    $bat = $chambre->getBatiment();

    $statement = $this->getPDO()->prepare("INSERT 
    INTO chambre (nom_chambre,id_batiment)
    VALUES (:nom_chambre,:id_batiment)");
    $statement->execute(array('nom_chambre' => $nom, 'id_batiment' => $bat));
    return $statement;
  }
  public function editCh(Chambre $chambr, $id)
  {
    $nom = $chambr->getNom_chambre();
    $bat = $chambr->getBatiment();

    $sql = "UPDATE chambre
     SET nom_chambre = '$nom',id_batiment='$bat'
      WHERE id_chambre='$id'";
    var_dump($sql);

    // Prepare statement
    $req = $this->getPDO()->prepare($sql);

    // execute the query
    $req->execute();

    //$req->execute("UPDATE type SET libelle=$libelle,montant=$montant WHERE id_type=$id");
  }
  public function deleteC($id)
  {
    $sql = 'DELETE FROM chambre '
      . 'WHERE id_chambre = :id_chambre';

    $stmt = $this->getPDO()->prepare($sql);

    $stmt->execute([':id_chambre' => $id]);

    return $stmt->rowCount();
  }
  //batiment
  public function   addBat(Batiment $bat)
  {
    $nom_bat = $bat->getNom_bat();
    $statement = $this->getPDO()->prepare("INSERT INTO batiment (nom_bat)
    VALUES (:nom_bat)");
    $statement->execute(array('nom_bat' => $nom_bat));
    return $statement;
  }
  public function  editBat(Batiment $bat, $id)
  {
    $nom_bat = $bat->getNom_bat();


    $sql = "UPDATE batiment SET nom_bat = '$nom_bat' WHERE id_batiment='$id'";
    var_dump($sql);

    // Prepare statement
    $req = $this->getPDO()->prepare($sql);

    // execute the query
    $req->execute();

    //$req->execute("UPDATE type SET libelle=$libelle,montant=$montant WHERE id_type=$id");
  }
  public function deletebat(Batiment $bat)
  {
    $id = $bat->getNom_bat();
    $sql = 'DELETE FROM batiment '
      . 'WHERE id_batiment = :id_batiment';

    $stmt = $this->getPDO()->prepare($sql);

    $stmt->execute([':id_batiment' => $id]);

    return $stmt->rowCount();
  }
  public function   findBAT()
  {
    $resultat = $this->getPDO()->query("SELECT * FROM Batiment");
    return  $resultat->fetchAll(PDO::FETCH_OBJ);
  }
}
