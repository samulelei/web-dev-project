<?php

$config = parse_ini_file("../../../config.ini");
$connection = mysqli_connect($config["dbaddr"], $config["username"], $config["password"], $config["dbname"]);

if($connection === false) {
    die("Database connection error: ") . mysqli_connect_error();
}
// echo "Database connection established." . "<br>"; *TESTIPARAMETRI*

// TESTING THE CONNECTION! not active
// $result = mysqli_query($connection, "select * from apartment");
// var_dump($result); 
// echo "<br>";

// while ($row = mysqli_fetch_assoc($result)) {
// var_dump($row);
// echo "<br>"; */

?>