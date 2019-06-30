<?php
require 'Autoloader.php';
Autoloader::register();

extract($_GET);
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}
$id = $_GET['id'];
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $et = new EtudiantService();
    $bat = new Batiment($id);
    $t = $et->deletebat($bat);
    header("location:findAllBat.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Burger Code</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>

<body>
   
    <div class="container">
        <div class="row">
            <h1><strong> Supprimer un Batiment </strong> </h1>
            <br>
            <form class="form" role="form" action="deleteBat.php?id" method="post">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <p class="alert alert-warning ">Etes vous sur de vouloir supprimer ?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">OUI</button>
                    <a class="btn btn-default" href="findAllBat.php">NON</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>