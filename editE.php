<?php
require 'Autoloader.php';
Autoloader::register();

$serv = new EtudiantService();
$id=$serv->editE();