<?php
$servername = "localhost";
$username = "root";
$password = "satya1997";
$dbname = "retailstore";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
