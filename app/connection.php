<?php
//Database Credentials
$username = "a3001337_crud_assignment";
$password = "Toiohomai1234";
$dbname = "a3001337_crud_assignment";

//Create Database Connection Object
$connection = new mysqli('localhost', $username, $password, $dbname) or die(mysqli_error($connection));

//Create a variable that stores all records from the database
$result = $connection->query("select * from subjectFiles") or die(mysqli_error($connection));
?>