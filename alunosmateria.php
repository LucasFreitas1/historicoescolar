<?php
require 'db.php';

$sql = 'SELECT * from alunosmateria';
$statement = $connection->prepare($sql);
$statement->execute();
$alunosmateria = $statement->fetchAll(PDO::FETCH_OBJ); ?>

<?php require 'header.php';?>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                <h2>Quantidade de alunos matriculados em uma materia</h2>
                </div>
                <div class="card-body">
                    <table class ="table table-bordered">
                        <tr>
                            <th>Nome matéria</th>
                            <th>Quantidade</th>
                            
                            
                        </tr>
                        <?php foreach($alunosmateria as $alunomateria):?>
                        <tr>
                            <td><?= $alunomateria->nome?></td>
                            <td><?= $alunomateria->quantidade?></td>

                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>

<?php require 'footer.php';?>