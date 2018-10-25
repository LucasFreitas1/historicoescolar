<?php

require 'db.php';
$message = '';

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

    $sql = 'INSERT into aluno(matricula,nome,num_telefone,num_ddd,nome_mae,nome_pai,nome_responsavel,id_tipo_etinia)
    values (:matricula,:nome,:numtelefone,:ddd,:nomemae,:nomepai,:nomeresponsavel,:etnia)';
    $statement = $connection->prepare($sql);

    if($statement->execute([':matricula'=> $matricula,':nome'=> $nome,':numtelefone'=> $numtelefone,':ddd'=> $ddd, ':nomemae'=>$nomemae,
    ':nomepai'=>$nomepai,':nomeresponsavel'=>$nomeresponsavel,':etnia'=>$etnia ]))
    {
        $message = 'dados cadastrados com sucesso';
    }
}

?>

<?php require 'header.php';?>

    <div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Cadastrar novo aluno</h2>
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
             <input type="text" name="matricula" id="matricula" class="form-control">
             </div>

             <div class="form-group">
             <label for="nome">Nome</label>
             <input type="text" name="nome" id="nome" class="form-control">
             </div>

             <div class="form-group">
             <label for="ddd">DDD</label>
             <input type="number" name="ddd" id="ddd" class="form-control">
             </div>

             <div class="form-group">
             <label for="numtelefone">Numero telefone</label>
             <input type="number" name="numtelefone" id="numtelefone" class="form-control">
             </div>

             <div class="form-group">
             <label for="nomemae">Nome da Mae</label>
             <input type="text" name="nomemae" id="nomemae" class="form-control">
             </div>

             <div class="form-group">
             <label for="nomepai">Nome do Pai</label>
             <input type="text" name="nomepai" id="nomepai" class="form-control">
             </div>
             
             <div class="form-group">
             <label for="nomeresponsavel">Nome Responsável</label>
             <input type="text" name="nomeresponsavel" id="nomeresponsavel" class="form-control">
             </div>

             <div class="form-group">
             <label for="etnia">Etnia</label>
             <select name="etnia" id="etnia" class="form-control">
                <option value="1">Branco</option>
                <option value="2">Negro</option>
                <option value="3">Indígena</option>
                <option value="4">Pardo</option>
                <option value="5">AMarelo</option>
             </select>
             
             </div>



            <div class="form-group">
            <button type="submit" class="btn btn-info">Cadastrar o aluno</button>
            </div>

            </form>
        </div>
        </div>
    </div>

<?php require 'footer.php';?>