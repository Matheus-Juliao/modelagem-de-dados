<?php include('insert_funcionario.php')?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro bancário</title>
        <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./scss/style.scss">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand"><i class="bi bi-bank"></i></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro_cliente_html.php">Cadastro de Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro_funcionario_html.php">Cadastro de Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select_cliente_html.php">Tabela de Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select_funcionario_html.php">Tabela de Funcionários</a>
                    </li>
                </ul>
            </div>
        </nav>

        <form class="container" action="cadastro_funcionario_html.php" method="POST">
        <div class="form-group">
                <h1>Cadastro Bancário - Funcionários</h1>
            </div>

            <div class="form-group">
                <h3>Dados Pessoais</h3>
            </div>

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Completo"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CFP"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label for="date">Data de nascimento</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="Data de Nascimento"
                    autocomplete="off">
            </div>
            <span>Sexo</span>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M">
                <label class="form-check-label" for="sexo">Masculino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F">
                <label class="form-check-label" for="sexo">Feminino</label>
            </div>

            <div class="form-group">
                <h3 style="margin-top: 10px !important;">Endereço</h3>
            </div>

            <div class="form-group">
                <label for="rua">Rua</label>
                <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua">
            </div>

            <div class="form-group">
                <label for="numero">Número</label>
                <input type="number" name="numero" id="numero" class="form-control" placeholder="Número">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
            </div>

            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="number" name="cep" id="cep" class="form-control" placeholder="CEP">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
            </div>

            <div class="form-group">
                <label for="Estado">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado">
            </div>

            <div class="form-group">
                <label for="Complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento">
            </div>

            <div class="form-group">
                <h3 style="margin-top: 10px !important;">Agência</h3>
            </div>

            <?php
                require("config.php");
                $query = ("SELECT * FROM agencia");
                $busca = mysqli_query($conexao, $query);
                while($dados = mysqli_fetch_array($busca)) {       
            ?>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="agencia" id="agencia" value="<?php echo $dados['id_agencia'];?>">
                    <label class="form-check-label" for="agencia"><?php echo $dados['agencia'];?></label>
                </div>
            <?php }?>

            <div class="form-group">
                <h3 style="margin-top: 10px !important;">Departamento</h3>
            </div>

            <?php
                require("config.php");
                $query = ("SELECT * FROM departamento");
                $busca = mysqli_query($conexao, $query);
                while($dados = mysqli_fetch_array($busca)) {       
            ?>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="departamento" id="departamento" value="<?php echo $dados['id_departamento'];?>">
                    <label class="form-check-label" for="departamento"><?php echo $dados['departamento']; ?></label>
                </div>
            <?php }?>

            <div class="form-group">
                <button type="button" name="record" id="record" class="btn btn-primary"
                    onClick="recordRegister()">Gravar</button>
                <button type="button" name="edit" id="edit" class="btn btn-primary" disabled="true"
                    onclick="editRegister()">Editar</button>
                <button type="submit" name="submit" id="submit" class="btn btn-primary" disabled="true">Enviar</button>
            </div>
        </form>
    </body>
    <script src="./js/index.js"></script>
</html>