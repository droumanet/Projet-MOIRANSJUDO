<?php
print_r($_POST);
$adh =  (string)implode("|",$_POST);
$file = fopen("test.txt","w");
fwrite($file, $adh);

$adherent = $_POST["adherents"]

?>