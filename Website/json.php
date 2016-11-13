<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    $json = $_POST['json'];
    echo $json;

   /* sanity check */
   if (json_decode($json) != null)
   {
       $file = fopen('/home/struan/Desktop/GUH/Website/api/info.json','w+');
       if (false === $file) {
           throw new RuntimeException('Unable to open log file for writing');
       }
       echo $file;
       fwrite($file, $json);
       fclose($file);
   }
   else
   {
       // user has posted invalid JSON, handle the error
   }
?>