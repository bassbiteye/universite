<?php
    
    require 'Autoloader.php'; 
    Autoloader::register(); 
    
    $et = new EtudiantService();

    $et->getEtudiantByMatricule('mat1');
    
    

?>