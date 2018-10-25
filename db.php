<?php
$dsn = 'mysql:host=35.238.39.13;dbname=escolas';
$username = '';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo 'deu zica';
}