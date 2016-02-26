<?php

function db_connect() {
   $result = new mysqli('localhost', 'Mass_Geekery', 'password', 'Mass_Geekery');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
       //echo "connected to database";
       return $result;
   }
}

?>
