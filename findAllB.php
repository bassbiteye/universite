<!DOCTYPE html>
<html>
<title>Universite</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">


<?php
require 'Autoloader.php'; 
Autoloader::register(); 
include 'menu.php';
?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">


  
<?php

include 'headerB.php';
?>




  

  <!-- Contact Section -->
  <div class="w3-container w3-padding-large ">
    <h4 id="contact"><b>Liste de type de bourse</b></h4>
   
    <hr class="w3-opacity">
  
<div class="container">

             
  <table class="table">
    <thead>
    
        <th>libelle</th>
        <th>Montant</th>
        <th>update</th>
        <th>delete</th>
        </thead>
        <tbody>

      <?php
    


$serv = new EtudiantService();


foreach($serv->findAll("type") as $type){
  $id_type=$type->id_type;
  $libelle=$type->libelle;
  $montant= $type->montant;
echo  '<tr><td>'.$libelle.'</td>'.
'<td>'.$montant.'</td>';
echo "<td ><a href='editB.php?id_type=$id_type&libelle=$libelle&montant=$montant' class='btn btn-primary'><i class='fa fa-fw fa-edit'></i>modifier</a></td>";
echo "<td ><a href='deleteB.php?id_type=$id_type' class='btn btn-danger'><i class='fa fa-fw fa-close'></i>delete</a></td>";
echo "</tr> ";

}
?>
    
   

    
    </tbody>
  </table>
</div>
  </div>

  <!-- Footer -->
 
  
  <div class="w3-black w3-center w3-padding-24">Powered by  bass</div>

<!-- End page content -->
</div>



</body>
</html>
