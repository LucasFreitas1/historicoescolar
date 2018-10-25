<?php
require 'db.php';

$matricula = $_GET['matricula'];
$sql = 'DELETE from aluno where matricula=:matricula';
$statement = $connection->prepare($sql);
if($statement->execute([':matricula' => $matricula])){

    header("Location: /");
 }