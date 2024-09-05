<?php
$servername = "localhost";
$database = "quickgames";
$username = "root";
$password = "senai";
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}


$login=$_POST["username"];
$senha=$_POST["password"];

$sql ="SELECT `id`, `nick`, `login_`, `senha`, `scorecobra`, `scoretetris`, `scoremario`, `scorevelha`, `scoretotal` FROM `quickgames` WHERE senha = '$senha' and login_ ='$login' ";

$result=$conn->query($sql);

if ($result -> num_rows> 0) {
    $row = $result->fetch_assoc();
    header("Location: phome2.php?id=".urldecode($row["id"]));
  
}else {
    echo"não cadastrado";
}