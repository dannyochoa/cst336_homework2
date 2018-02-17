<?php

$multiTIFF = new Imagick();

$mytifspath = "./img"; // your image directory

$files = scandir($mytifspath);

//print_r($files);
   
/*foreach( $files as $f )
{*/

for($i=2;$i<6;$i++)
{
    echo $files[$i];
    
    echo "<br>";
    $auxIMG = new Imagick();
    $auxIMG->readImage($mytifspath."/".$files[$i]);
   
    $multiTIFF->addImage($auxIMG);
}

//file multi.TIF
$multiTIFF->writeImages('multi423432.gif', true); // combine all image into one single image

//files multi-0.TIF, multi-1.TIF, ...
$multiTIFF->writeImages('multi.gif', false);

?>