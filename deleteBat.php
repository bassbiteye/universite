<?php
require 'Autoloader.php';
Autoloader::register();

$id=extract($_GET);
$et = new EtudiantService();
$bat= new Batiment($id);
$t=$et->deletebat($bat);
header("location:findAllBat.php");
?>