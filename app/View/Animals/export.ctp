<?php

//$line = $animals[0]['Animal'];

$this->CSV->addRow(array_keys($line));

 foreach ($animals as $animal)
 {
   
   $line = $animal['Animal'];

   //$line = $animal['Animal']['estado']; 
   
   $this->CSV->addRow($line);
 
 }
 
 $filename='reporte';
 
 echo  $this->CSV->render($filename);

?>