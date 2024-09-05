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
$nick = $_POST['username'];
$login = $_POST['login'];
$senha = $_POST['password'];

// Verificando se o login e a senha já existem no banco de dados
$sql = "SELECT * FROM quickgames WHERE logar = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $login, $senha);
$stmt->execute();
$result = $stmt->get_result();

// Se existir um resultado, então o login e senha já existem
if ($result->num_rows > 0) {
    echo "Erro: Este login e senha já estão em uso. Tente novamente.";
} else {
    // Inserindo os dados na tabela se o login e senha não existirem
    $stmt = $conn->prepare("INSERT INTO quickgames (nick, logar, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nick, $login, $senha);

    if ($stmt->execute()) {
        // Redirecionar para a página especificada após o registro bem-sucedido
        header("Location: home.html");
        exit(); // Sempre use exit após o redirecionamento para evitar que o restante do código seja executado
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }
}

// Fechando a conexão
$stmt->close();
$conn->close();
?>