<?php
define('SERVER', 'localhost');

define('USERNAME', 'root');

define('PASSWORD', 'moonstack');

define('NAME', 'penet');

$conn = mysql_connect(SERVER,USERNAME,PASSWORD);
 $dbcon = mysql_select_db(NAME);

 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }

 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }

 ?>
