<?php
require 'Autoloader.php';
Autoloader::register();
$nom = $prenom = $email = $tel = $date = "";
$nomError = $prenomError = $emailError = $telError = $dateError = "";
$isSuccess = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  


        $id = verifyInput($_POST['id']);
    // $matricule = verifyInput($_POST['matricule']);
    $nom = verifyInput($_POST['nom']);
    $prenom = verifyInput($_POST['prenom']);
    $email = verifyInput($_POST['email']);
    $tel = verifyInput($_POST['tel']);
    $date = verifyInput($_POST['date']);
   // $adresse = verifyInput($_POST['adresse']);
   // $type = verifyInput($_POST['type']);
    //$chambre = verifyInput($_POST['chambre']);
    $isSuccess = true;
  
    if (empty($nom)) {
        $nomError = "Et oui je veux tout savoir. Meme le nom";
        $isSuccess = false;
    }
    if (empty($prenom)) {
        $prenomError = "Et oui je veux tout savoir. Meme le prenom";
        $isSuccess = false;
    }


    if (empty($date)) {
        $dateError = " je veux connaitre ta date de naissance ?";
        $isSuccess = false;
    }
    if (!isEmail($email)) {
        $emailError = "T'essais de me rouler ? C'est pas un email ca";
        $isSuccess = false;
    }

    if (!isPhone($tel)) {
        $telError = "Que des chiffres et des espaces,stp...";
        $isSuccess = false;
    }
}
    if ($isSuccess) {

        $serv = new EtudiantService();
        $et = new Boursier('mat',$nom,$prenom,$email,$tel,$date,'adresse');
        $a = $serv->editE($et,$id);
        header("location:findAllE.php?ok='$ok'");
       

       

    }

function verifyInput($var)
{
    $var = trim($var);
    $var = stripcslashes($var);
    $var = htmlspecialchars($var);

    return $var;
}
function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}
function isPhone($var)
{
    return preg_match("/^[0-9 ]*$/", $var);
}


?>


<!DOCTYPE html>
<html>
<title>Universite</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", sans-serif
    }

    .comments {
        font-style: italic;
        font-size: 18px;
        color: #d82c2e;
        height: 25px;
    }
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

        <?php
        include 'headerE.php';
        ?>







        <!-- Contact Section -->
        <div class="w3-container w3-padding-large ">
            <h4 id="contact"><b>ajout etudiant</b></h4>

            <hr class="w3-opacity">
            <form action=""  method="post">
            <div class="w3-section" hidden>
            <input class="w3-input w3-border" type="number" name="id"  value="<?php echo $_GET['id'];  ?>">
            </div>
                <div class="w3-section">
                    <label>matricule</label>
                  
                   <input class="w3-input w3-border" type="text" name="matricule" disabled="disabled" value="<?php echo $_GET['matricule'];  ?>" >
                    
                </div>
                <div class="w3-section">
                    <label>Nom</label>
                    <input class="w3-input w3-border" type="text" name="nom" value="<?php echo $_GET['nom'];  ?>">
                    <p class="comments"><?php echo $nomError; ?></p>
                </div>
                <div class="w3-section">
                    <label>Prenom</label>
                    <input class="w3-input w3-border" type="text" name="prenom" value="<?php echo $_GET['prenom'];  ?>">
                    <p class="comments"><?php echo $prenomError; ?></p>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                    <input class="w3-input w3-border" type="text" name="email" value="<?php echo $_GET['email'];  ?>">
                    <p class="comments"><?php echo $emailError; ?></p>
                </div>
                <div class="w3-section">
                    <label>Telephone</label>
                    <input class="w3-input w3-border" type="tel" name="tel" value="<?php echo $_GET['tel'];  ?>">
                    <p class="comments"><?php echo $telError; ?></p>
                </div>
                <div class="w3-section">
                    <label>date de naissance</label>
                    <input class="w3-input w3-border" type="date" name="date" value="<?php echo $_GET['date'];  ?>">
                    <p class="comments"><?php echo $dateError; ?></p>
                </div>
               
                    <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-edit w3-margin-right"></i>Modifier</button>
                    <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-close w3-margin-right"></i>annuler</button>
            </form>
        </div>



        <div class="w3-black w3-center w3-padding-24">Powered by bass</div>

        <!-- End page content -->
    </div>

    <script>
       
    </script>

</body>

</html>