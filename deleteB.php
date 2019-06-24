<?php
require 'Autoloader.php';
Autoloader::register();

$id=extract($_GET);
$et = new EtudiantService();
$t=$et->deleteType($id);
header("location:findAllB.php");
?>