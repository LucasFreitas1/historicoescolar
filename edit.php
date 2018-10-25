<?php
require 'db.php';

$matricula = $_GET['matricula'];
$sql = 'SELECT * FROM aluno WHERE matricula =:matricula';
$statement = $connection->prepare($sql);
$statement->execute([':matricula'=> $matricula]);
$aluno = $statement->fetch(PDO::FETCH_OBJ);


if (isset($_POST['matricula'])
    && isset($_POST['nome'])
    && isset($_POST['numtelefone'])
    && isset($_POST['ddd'])
    && isset($_POST['nomemae'])
    && isset($_POST['etnia'])) {

echo 'passou';

    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $numtelefone = $_POST['numtelefone'];
    $ddd = $_POST['ddd'];
    $nomemae = $_POST['nomemae'];
    $nomepai = $_POST['nomepai'];
    $nomeresponsavel = $_POST['nomeresponsavel'];
    $etnia = $_POST['etnia'];
    
    $sql = 'UPDATE aluno SET nome=:nome, num_telefone=:numtelefone,
    num_ddd=:ddd, nome_mae=:nomemae, nome_pai=:nomepai, nome_responsavel=:nomeresponsavel, id_tipo_etinia=:etnia 
    WHERE matricula=:matricula';


    $statement = $connection->prepare($sql);

    if($statement->execute([':matricula'=> $matricula,':nome'=> $nome,':numtelefone'=> $numtelefone,':ddd'=> $ddd, ':nomemae'=>$nomemae,
    ':nomepai'=>$nomepai,':nomeresponsavel'=>$nomeresponsavel,':etnia'=>$etnia ]))
    {
        header("Location: /");
        $message = 'dados atualizados  com sucesso';
    }
}

?>

<?php require 'header.php';?>

    <div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Atualizar dados</h2>
        </div>
        <div class="card-body">
        <?php if(!empty($message)): ?>
        <div class="alert alert-sucess">
        <?= $message; ?>
        </div>
        <?php endif; ?>
            <form method="post">

             <div class="form-group">
             <label for="matricula">Matricula</label>
             <input value="<?= $aluno->matricula; ?>" type="text" class="form-control" readonly>
             </div>

             <div class="form-group">
             <label for="nome">Nome</label>
             <input value="<?= $aluno->nome;?>" type="text" name="nome" id="nome" class="form-control">
             </div>

             <div class="form-group">
             <label for="ddd">DDD</label>
             <input value="<?= $aluno->num_ddd;?>" type="number" name="ddd" id="ddd" class="form-control">
             </div>

             <div class="form-group">
             <label for="numtelefone">Numero telefone</label>
             <input value="<?= $aluno->num_telefone;?>" type="number" name="numtelefone" id="numtelefone" class="form-control">
             </div>

             <div class="form-group">
             <label for="nomemae">Nome da Mae</label>
             <input value="<?= $aluno->nome_mae;?>" type="text" name="nomemae" id="nomemae" class="form-control">
             </div>

             <div class="form-group">
             <label for="nomepai">Nome do Pai</label>
             <input value="<?= $aluno->nome_pai;?>" type="text" name="nomepai" id="nomepai" class="form-control">
             </div>
             
             <div class="form-group">
             <label for="nomeresponsavel">Nome Responsável</label>
             <input value="<?= $aluno->nome_responsavel;?>" type="text" name="nomeresponsavel" id="nomeresponsavel" class="form-control">
             </div>

             <div class="form-group" >
             <label for="etnia">Etnia</label>
             <select value="<?= $aluno->etnia;?>" name="etnia" id="etnia" class="form-control">
                <option value="1">Branco</option>
                <option value="2">Negro</option>
                <option value="3">Indígena</option>
                <option value="4">Pardo</option>
                <option value="5">AMarelo</option>
             </select>
             </div>

            <div class="form-group">
            <button type="submit" class="btn btn-info">Atualizar os dados do aluno</button>
            <a href="index.php" class="btn btn-danger">Cancelar alterações</a>
            </div>

            </form>
        </div>
        </div>
    </div>

<?php require 'footer.php';?>