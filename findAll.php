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
include 'menu.php';
?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Boursier</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black"> <a href="index.php">home</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="ajouter.php">add</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="findAll.php">findAll</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="find.php">find</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="edit.php">edit</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="delete.php">delete</a></button>
    </div>
    </div>
  </header>
  
  




  

  <!-- Contact Section -->
  <div class="w3-container w3-padding-large ">
    <h4 id="contact"><b>Liste etudiant</b></h4>
   
    <hr class="w3-opacity">
  
<div class="container">

             
  <table class="table">
    <thead>
    
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Date</th>
        </thead>
        <tbody>

      <?php
    
require 'Autoloader.php'; 
Autoloader::register(); 

$serv = new EtudiantService();
$ser = new EtudiantService();
$ser ->getEtudiantByMatricule('mat2');
foreach($serv->findAll("Etudiant") as $etu){
echo  '<tr><td>'. $etu ->matricule.'</td>'.
'<td>'. $etu ->nom.'</td>'.
'<td>'. $etu ->prenom.'</td>'.
'<td>'. $etu ->email.'</td>'.
'<td>'. $etu ->telephone.'</td>'.
'<td>'. $etu ->date_naissance.'</td></tr>'
;
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

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
