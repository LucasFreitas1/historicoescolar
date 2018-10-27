<?php
$dsn = 'mysql:host=35.238.39.13;dbname=escolas';
$username = ''; #digitar usuario entre aspas para login no banco
$password = ''; #digitar senha para acesso ao banco entre aspas
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo 'deu zica';
}