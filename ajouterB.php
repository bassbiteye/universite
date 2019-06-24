<?php
require 'Autoloader.php';
Autoloader::register();
$montant =  $type = "";
$montantError =  $typeError = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $montant = verifyInput($_POST['montant']);
    $type = verifyInput($_POST['type']);

    $isSuccess = true;
    //var_dump($_POST);
    if (empty($type)) {
        $typeError = "Et oui je veux le type";
        $isSuccess = false;
    }


    if (!isPhone($montant)) {
        $montantError = "Que des chiffres et des espaces,stp...";
        $isSuccess = false;
    }
}

if ($isSuccess) {

    $serv = new EtudiantService();
    $t = new Type($type,$montant);


    $t = $serv->addType($t);
    var_dump($t);
}
function verifyInput($var)
{
    $var = trim($var);
    $var = stripcslashes($var);
    $var = htmlspecialchars($var);

    return $var;
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
    <div class="w3-overlay w3-hide-large w3-animate-opacity"  style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">

        <!-- Header -->
        <?php

        include 'headerB.php';
        ?>








        <!-- Contact Section -->
        <div class="w3-container w3-padding-large ">
            <h4 id="contact"><b>ajout Type</b></h4>

            <hr class="w3-opacity">
            <form action="" target="_blank" method="post">

                <div class="w3-section">
                    <label>type</label>
                    <input class="w3-input w3-border" type="text" name="type">
                    <p class="comments"><?php echo $typeError; ?></p>
                </div>

                <div class="w3-section">
                    <label>montant</label>
                    <input class="w3-input w3-border" type="number" name="montant">
                    <p class="comments"><?php echo $montantError; ?></p>
                </div>
                <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-plus w3-margin-right"></i><a href="findAllB.php">Ajouter</a></button>
                <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-close w3-margin-right"></i>annuler</button>
            </form>
        </div>



        <div class="w3-black w3-center w3-padding-24">Powered by bass</div>

        <!-- End page content -->
    </div>


</body>

</html>