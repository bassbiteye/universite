<?php 
 
    require 'EtudiantService.php';
    $serv = new EtudiantService();
	if(isset($_POST)) {

    
    $id =$_POST['bat']; 
    //$id =2; 
    $req = $serv->getPDO()->query("SELECT * FROM chambre where id_batiment = " .$id );
    $chambre = $req->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($chambre);
	}
 ?>