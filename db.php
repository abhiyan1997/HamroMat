<?php
$servername= "localhost";
$username= "root";
$pw= "";
$dbname= "hamromat";

$conn= mysqli_connect($servername, $username, $pw, $dbname);

if(!$conn)
{
   die("SERVER ERROR TRY AFTER SOMETIMES"); 
}
?>