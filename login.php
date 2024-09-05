<?php
// Configurações do banco de dados
$servername = "localhost";
$database = "quickgames";
$username = "root";
$password = "senai";

// Criando a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebendo os dados do formulário
$login = $_POST['login'];
$senha = $_POST['password'];

// Verificando se o login e a senha estão corretos
$sql = "SELECT `logar`, `senha`, `id` FROM `quickgames` WHERE logar ='$login' and senha = '$senha'";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION["Sessão"] = $row['id'];
    header("Location: home.html");
  } else {
      echo "<script> alert('Email incorretos')</script>";
      header('Location: login.html');
  }


?>