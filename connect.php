<?php
   $server = 'localhost';
   $user = 'root';
   $pass = '';
   $db = 'student chatbot';

   $conn =  new mysqli($server,$user, $pass, $db) or die("Not Connected!");
   
?>