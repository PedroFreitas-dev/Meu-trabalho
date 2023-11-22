<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die ("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM cadastro";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]."-Nome: " . $row["nome"]. "-Email: " . $row["email"]."<br>";
        }
    } else {
        echo "0 resultados";
    }

    $conn->close();
?>