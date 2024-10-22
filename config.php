<?php
$host = 'localhost'; // ou o endereço do seu servidor
$db = 'nome_do_banco'; // nome do seu banco de dados
$user = 'usuario'; // usuário do banco
$pass = 'senha'; // senha do banco

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
