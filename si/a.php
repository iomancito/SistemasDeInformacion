<?php

require_once 'class/dbhandler.php';



$mysqli = new dbhandler();

$product = $mysqli->login("pruebasingup@asd.as","1234");

if($product== FALSE) echo "false";
else echo "trues";

echo $product->getName()."<br>";
//echo $product->getDescription()."<br>";
//echo $product->getPrice()."<br>";
//echo $product->getImage()."<br>";

?>
