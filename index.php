<?php
require 'db.php';

$sql = 'SELECT * from aluno order by matricula';
$statement = $connection->prepare($sql);
$statement->execute();
$alunos = $statement->fetchAll(PDO::FETCH_OBJ); ?>

<?php require 'header.php';?>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                <h2>Lista de alunos matriculados</h2>
                </div>
                <div class="card-body">
                    <table class ="table table-bordered">
                        <tr>
                            <th>Matricula</th>
                            <th>Nome</th>
                            <th>DDD</th>
                            <th>Telefone</th>
                            <th>Nome Mae</th>
                            <th>Nome Pai</th>
                            <th>Etnia</th>
                            <th>Detalhes</th>
                        </tr>
                        <?php foreach($alunos as $aluno):?>
                        <tr>
                            <td><?= $aluno->matricula ?></td>
                            <td><?= $aluno->nome ?></td>
                            <td><?= $aluno->num_ddd ?></td>
                            <td><?= $aluno->num_telefone?></td>
                            <td><?= $aluno->nome_mae ?></td>
                            <td><?= $aluno->nome_pai ?></td>
                            <td><?= $aluno->id_tipo_etinia ?></td>
                            <td>
                                <a href="edit.php?matricula=<?= $aluno->matricula ?>" class="btn btn-info">Detalhes</a>
                                <a onclick="return confirm('Tem certeza que deseja deletar?')" href="delete.php?matricula=<?= $aluno->matricula ?>" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>

<?php require 'footer.php';?>