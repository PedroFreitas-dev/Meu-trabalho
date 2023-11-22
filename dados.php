
<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

    // Cria uma conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se houve algum erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os valores do formulário
    $nome_completo = $_POST["nome_completo"];
    $nome_de_usuario = $_POST["nome_de_usuario"];
    $email = $_POST["email1"];
    $senha = $_POST["senha1"];
    $email2 = $_POST["email2"];
    $senha2 = $_POST["senha2"];

    if ($email == $email2 and $senha == $senha2){

    // Insere os dados no banco de dados
    $sql = "INSERT INTO clientes (nome_completo, nome_de_usuario, email, senha) VALUES ('$nome_completo', '$nome_de_usuario', '$email', '$senha')";

    if ($conn->query($sql) === true) {
        header("Location:sucesso.html");
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
else {
    echo "AS SENHAS OU OS E-MAILS NÃO SÃO IGUAIS. TENTE NOVAMENTE";
    header("Location:erro.html");
}
}
?>

