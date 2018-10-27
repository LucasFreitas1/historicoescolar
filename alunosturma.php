<?php
require 'db.php';

$sql = 'SELECT * from alunosturma';
$statement = $connection->prepare($sql);
$statement->execute();
$alunosturma = $statement->fetchAll(PDO::FETCH_OBJ); ?>

<?php require 'header.php';?>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                <h2>Tabela de alunos por tipo de Turma</h2>
                </div>
                <div class="card-body">
                    <table class ="table table-bordered">
                        <tr>
                            <th>Tipo turma</th>
                            <th>Quantidade</th>
                            
                            
                        </tr>
                        <?php foreach($alunosturma as $alunoturma):?>
                        <tr>
                            <td><?= $alunoturma->Tipo_Turma?></td>
                            <td><?= $alunoturma->Quantidade_alunos ?></td>

                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>

<?php require 'footer.php';?>