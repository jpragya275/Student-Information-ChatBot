<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chatBot";

$con = mysqli_connect($servername, $username, $password, $database);
if(!$con){
    die("failed to connect ". mysqli_connect_error());
}
// else{
//     echo "connection established ";
// }
?>