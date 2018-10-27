<?php
require 'db.php';

$sql = 'SELECT * from alunoescola';
$statement = $connection->prepare($sql);
$statement->execute();
$alunosescola = $statement->fetchAll(PDO::FETCH_OBJ); ?>

<?php require 'header.php';?>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                <h2>Alunos que ja passaram por outras escolas</h2>
                </div>
                <div class="card-body">
                    <table class ="table table-bordered">
                        <tr>
                            <th>Nome aluno</th>
                            <th>Quantidade de escolas passadas</th>
                            
                            
                        </tr>
                        <?php foreach($alunosescola as $alunoescola):?>
                        <tr>
                            <td><?= $alunoescola->nome ?></td>
                            <td><?= $alunoescola->quantidade ?></td>

                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>

<?php require 'footer.php';?>