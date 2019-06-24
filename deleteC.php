<?php
require 'Autoloader.php';
Autoloader::register();

$id=extract($_GET);
$et = new EtudiantService();

$t=$et->deleteC($id);
header("location:findAllC.php");
?>