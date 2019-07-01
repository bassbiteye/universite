<!DOCTYPE html>
<html>
<title>Universite</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <button class="w3-button w3-black"> <a href="#">ajout</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="findAll.php">findAll</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="#">find</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="#">edit</a></button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="#">delete</a></button>
    </div>
    </div>
  </header>
  
  




  

  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>ajout etudiant</b></h4>
   
    <hr class="w3-opacity">
    <form action="" target="_blank" method="post">
      <div class="w3-section">
        <label>matricule</label>
        <input class="w3-input w3-border" type="text" name="matricule" required>
      </div>
      <div class="w3-section">
        <label>Nom</label>
        <input class="w3-input w3-border" type="text" name="nom" required>
      </div>
      <div class="w3-section">
        <label>Prenom</label>
        <input class="w3-input w3-border" type="text" name="prenom" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="email" required>
      </div>
      <div class="w3-section">
        <label>Telephone</label>
        <input class="w3-input w3-border" type="tel" name="tel" required>
      </div>
      <div class="w3-section">
        <label>date de naissance</label>
        <input class="w3-input w3-border" type="date" name="date" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-plus w3-margin-right"></i>ajouter</button>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-close w3-margin-right"></i>annuler</button>
    </form>
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
