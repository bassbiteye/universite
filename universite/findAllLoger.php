<!DOCTYPE html>
<html>
<title>Universite</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table').DataTable({

      language: {

        'sSearch': 'Rechercher',
        'sInfo': 'lignes __START__ a __END__ sur __TOTAL__',
        'sLengthMenu': 'Afficher __MENU__ lignes',
        'oPaginate': {
          'sNext': '__Suivant',
          'sPrevious': '  precedent__'
        }

      }

    });

  });
</script>
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
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <?php
        include 'headerE.php';
        ?>

  
  




  

  <!-- Contact Section -->
  <div class="w3-container w3-padding-large ">
    <h4 id="contact"><b>Liste etudiant</b></h4>
   
    <hr class="w3-opacity">
  
<div class="container">

             
  <table class="table" id="table">
    <thead>
    
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Date</th>
        <th>libelle</th>
        <th>montant</th>
        <th>chambre</th>
        <th>batiment</th>
        <th>Statut</th>
        </thead>
        <tbody>

      <?php
    

$serv = new EtudiantService();


foreach($serv->loger() as $etu){
 
    echo  '<tr>
    <td>'.$etu->mat.'</td>'.
    '<td>'.$etu->nom.'</td>'.
    '<td>'.$etu->prenom.'</td>'.
    '<td>'.$etu->email.'</td>'.
    '<td>'.$etu->telephone.'</td>'.
    '<td>'.$etu->date_naissance.'</td>'.
    '<td>'.$etu->type_bourse.'</td>'.
    '<td>'.$etu->montant.'</td>'.
    '<td>'.$etu->chambre.'</td>'.
    '<td>'.$etu->batiment.'</td>';
    echo "<td ><a href='#' class='btn btn-danger'>LOGER</a></td>";
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
