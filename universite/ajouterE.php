<?php
require 'Autoloader.php';
Autoloader::register();
$nom = $prenom = $email = $tel = $date = "";
$nomError = $prenomError = $emailError = $telError = $dateError = $emailD = $telD = "";
$isSuccess = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nom = verifyInput($_POST['nom']);
    $prenom = verifyInput($_POST['prenom']);
    $email = verifyInput($_POST['email']);
    $tel = verifyInput($_POST['tel']);
    $date = verifyInput($_POST['date']);
    $adresse = verifyInput($_POST['adresse']);
    $type = verifyInput($_POST['type']);
    $chambre = verifyInput($_POST['chambre']);
    $isSuccess = true;
    if (isset($tel)) {
        $test = new EtudiantService();
        foreach ($test->findval('telephone', $tel) as $etu) {
            $telD = "Ce numéro de telephone existe déja";
            $isSuccess = false;
        }
    }
    if (isset($email)) {
        $test = new EtudiantService();
        foreach ($test->findval('email',$email) as $etu) {
            if($email==$etu->email){
                $emailD = "Ce mél existe déja";
                $isSuccess = false;
               
            }
            
        }
    }
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
    $et = new EtudiantService();
    foreach ($et->getidEtu() as $etu) {

        $e = $etu->id_etudiant + 1;
        $Matricule = "ET" . "$e" . "DU";
    }

    if (empty($adresse) && empty($chambre) && !empty($type)) {
        $et = new Boursier($Matricule, $nom, $prenom, $email, $tel, $date, $type);
    } else  if (empty($adresse) && !empty($chambre) && !empty($type)) {
        $et = new Loger($Matricule, $nom, $prenom, $email, $tel, $date, $type, $chambre);
    } else {
        $et = new NonBoursier($Matricule, $nom, $prenom, $email, $tel, $date, $adresse);
    }

   $serv->add($et);
    header("location:findAllE.php?ok='ok'");
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

    .thank-you {
        text-align: center;
        margin-top: 15px;
        font-weight: bold;
        font-size: 22px;
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form" method="post">
                <div class="w3-section">
                    <label>matricule</label>
                    <?php
                    $et = new EtudiantService();
                    foreach ($et->getidEtu() as $etu) {

                        $e = $etu->id_etudiant + 1;
                        $Matricule = "ET" . "$e" . "DU";
                    }
                    ?>
                    <input class="w3-input w3-border" type="text" name="matricule" disabled="disabled" value="<?php echo $Matricule ?>">

                </div>
                <div class="w3-section">
                    <label>Nom</label>
                    <input class="w3-input w3-border" type="text" name="nom" value="<?php echo $nom;  ?>">
                    <p class="comments"><?php echo $nomError; ?></p>
                </div>
                <div class="w3-section">
                    <label>Prenom</label>
                    <input class="w3-input w3-border" type="text" name="prenom" value="<?php echo $prenom;  ?>">
                    <p class="comments"><?php echo $prenomError; ?></p>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                
                    <input class="w3-input w3-border" type="text" name="email" value="<?php echo $email;  ?>">
                    <p class="comments"><?php if($emailError){echo $emailError;} if($emailD){echo $emailD;}  ?></p>

                </div>
                <div class="w3-section">
                    <label>Telephone</label>
                   
                    <input class="w3-input w3-border" type="tel" name="tel" value="<?php echo $tel;  ?>">
                    <p class="comments"><?php if($telError){echo $telError;} if($telD){echo $telD;} ?></p>

                </div>
                <div class="w3-section">
                    <label>date de naissance</label>
                    <input class="w3-input w3-border" type="date" name="date" value="<?php echo $date;  ?>">
                    <p class="comments"><?php echo $dateError; ?></p>
                </div>
                <div class="w3-section">
                    <label>statut</label>
                    <div class="form-check-inline">
                        <label class="form-check-label" id="hide1">
                            <input id="boursier" type="radio" class="form-check-input" name="optradio">Boursier
                        </label>
                    </div>
                    <div class="form-check-inline" id="hide2">
                        <label class="form-check-label">
                            <input id="loger" type="radio" class="form-check-input" name="optradio">loger
                        </label>
                    </div>

                    <div class="form-check-inline" id="hide3">
                        <label class="form-check-label">
                            <input id="nonboursier" type="radio" class="form-check-input" name="optradio">Non Bousier
                        </label>
                    </div>
                    <div hidden class="w3-section" id="adresse">
                        <label>addresse</label>
                        <input class="w3-input w3-border" type="text" name="adresse">
                    </div>
                    <div class="w3-section" id="type" hidden>
                        <label id="type">bourse</label>
                        <select id="type" class="form-control" name="type">
                            <option value=""></option>
                            <?php


                            $type = new EtudiantService();


                            foreach ($type->findAll("type") as $lib) {
                                echo "<option value=$lib->id_type>$lib->libelle</option>";
                            }

                            ?>
                        </select>

                    </div>

                    <div class="w3-section" id="batiment" hidden>
                        <label name="batiment">Batiment</label>

                        <select class="form-control" id="batiment1" name="batiment1">
                            <option></option>
                            <?php
                            $bat = new EtudiantService();
                            $bt = $bat->findAll("batiment");
                            foreach ($bt as $b) {
                                echo "<option id=$b->id_batiment value=$b->id_batiment>$b->nom_bat</option>";
                            }
                            ?>
                        </select>




                    </div>
                    <div class="w3-section" id="chambre1" hidden>
                        <label id="chambre2">chambre</label>
                        <select id="chambre" class="form-control" name="chambre">
                         <option></option>   
                        </select>

                    </div>
                    <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-plus w3-margin-right"></i>ajouter</button>
                    <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-close w3-margin-right"></i>annuler</button>

            </form>
        </div>



        <div class="w3-black w3-center w3-padding-24">Powered by bass</div>

        <!-- End page content -->
    </div>

    <script>
        $(document).ready(function() {

            $("#boursier").click(function() {
                $("#hide2").toggle();
                $("#hide3").toggle();
                $("#adresse").hide();
                $("#chambre").hide();
                $("#batiment1").hide();
                $("#batiment").hide();
                $("#type").fadeIn(10);

            });
            $("#loger").click(function() {
                $("#hide1").toggle();
                $("#hide3").toggle();
                $("#adresse").hide();
                $("#type").fadeIn();
                $("#chambre").fadeIn();
                $("#chambre1").fadeIn();
                $("#batiment1").fadeIn();
                $("#batiment").fadeIn();
            });
            $("#nonboursier").click(function() {
                $("#hide1").toggle();
                $("#hide2").toggle();
                $("#adresse").fadeIn();
                $("#type").hide();
                $("#chambre").hide();
                $("#batiment1").hide();
                $("#batiment").hide();
            });

            $('#batiment1').change(function() {
                var bat = $('#batiment1').val();
                console.log(bat);
                $.ajax({
                    url: 'getChambre.php',
                    method: 'post',
                    data: 'bat=' + bat,
                }).done(function(chambres) {
                    chambres = JSON.parse(chambres);
                    console.log(chambres);
                    chambres.forEach(function(chambre) {
                        console.log(chambre);
                        $('#chambre').append('<option value='+chambre.id_chambre+'>' + chambre.nom_chambre + '</option>')
                    })
                })
            })

        });
    </script>

</body>

</html>