<?php
require 'db.php';

$sql = 'SELECT * from qtdetnia';
$statement = $connection->prepare($sql);
$statement->execute();
$qtdetnias = $statement->fetchAll(PDO::FETCH_OBJ); ?>

<?php require 'header.php';?>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                <h2>Tabela de alunos por etnia</h2>
                </div>
                <div class="card-body">
                    <table class ="table table-bordered">
                        <tr>
                            <th>Etnia</th>
                            <th>Quantidade</th>
                            
                            
                        </tr>
                        <?php foreach($qtdetnias as $qtdetnia):?>
                        <tr>
                            <td><?= $qtdetnia->Etnia ?></td>
                            <td><?= $qtdetnia->Quantidade ?></td>

                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>

<?php require 'footer.php';?>