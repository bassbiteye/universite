
<?php
require 'Autoloader.php';
Autoloader::register();
$serv = new EtudiantService();
       // var_dump($serv);
      
   
           $et = new NonBoursier('matr1111', 'baa', 'faa', 'telst', 7711, '1996-02-02', 'hlm');
       
        var_dump($et);
        $serv ->add($et);