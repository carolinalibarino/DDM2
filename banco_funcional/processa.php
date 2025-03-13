<?php
// processa.php

$servername = "localhost"; // ou o endereço do seu servidor
$username = "root"; // substitua pelo seu usuário do banco de dados
$password = ""; // substitua pela sua senha do banco de dados
$dbname = "banco"; // substitua pelo nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$seguro = $_POST['seguro'];
$carro = $_POST['carro'];
$endereco = $_POST['endereco'];

// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO clientes (nome, nascimento, seguro, carro, endereco) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $nascimento, $seguro, $carro, $endereco);

// Executar a consulta
if ($stmt->execute()) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>