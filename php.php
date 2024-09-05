<?php
$servername = "localhost";
$database = "quickgames";
$username = "root";
$password = "senai";
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}