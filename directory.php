<?php

$filename = "http://localhost/penetesting/database/config.php";
$file_handler = fopen($filename, "r");
$contents = fread($file_handler,1024);
fclose($file_handler);
echo $contents;



 ?>
