
<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificação do formulário de login
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta ao banco de dados para verificar se o usuário existe
    $sql = "SELECT * FROM clientes WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // if (password_verify($senha, $row['senha'])) {
        if (($senha == $row['senha'])) {
            header("Location:pagina1.html");
        } else {
            header("Location:erro_login.html");
        }
    } else {
        header("Location:erro_login_cadastrar.html");
    }
}

$conn->close();
?>



