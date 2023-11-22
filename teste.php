<?php
$servername = "localhost"; // Nome do servidor (pode ser diferente)
$username = "root"; // Seu nome de usuário do MariaDB
$password = ""; // Sua senha do MariaDB
$dbname = "biblioteca"; // Nome do banco de dados que você deseja criar

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Cria o banco de dados
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso\n";
} else {
    echo "Erro ao criar banco de dados: " . $conn->error . "\n";
}

// Seleciona o banco de dados criado
$conn->select_db($dbname);

// Cria a tabela 'cadastro' com os campos especificados
$sql1 = "CREATE TABLE IF NOT EXISTS cadastro (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(30) NOT NULL
)";

// Cria a tabela 'clientes' com os campos especificados
$sql2 = "CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    nome_de_usuario VARCHAR (255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(30) NOT NULL
)";

if ($conn->query($sql1) === TRUE) {
    echo "Tabela 'cadastro' criada com sucesso\n";
} else {
    echo "Erro ao criar tabela: " . $conn->error . "\n";
}

if ($conn->query($sql2) === TRUE) {
    echo "Tabela 'clientes' criada com sucesso\n";
} else {
    echo "Erro ao criar tabela: " . $conn->error . "\n";
}

// Fecha a conexão
$conn->close();
?>