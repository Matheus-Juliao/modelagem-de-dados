<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro bancário</title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
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

        <form class="container formFun" action="select_funcionario_html.php" method="GET" style="margin-left: 0;">
            <div class="form-group">
                <h1>Cadastro Bancário - Tabela Funcionários
                    <a href="gerar_planilha_funcionario.php">
                        <button type="button" class="btn" style="background-color: #90EE90;" >Exportar para o Excel</button>
                    </a>
                </h1>
            </div>
            <div class="form-group">
                <h3>Dados Pessoais</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome funcionário</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Data Nascimento</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Número</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cep</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Complemento</th>
                        <th scope="col">Agência</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <?php
                    require("config.php");
                    $query = ("SELECT 
                    f.id_funcionario,
                    f.nome_funcionario,
                    f.cpf,
                    f.data_de_nascimento,
                    f.sexo,
                    e.rua,
                    e.numero,
                    e.bairro,
                    e.cep,
                    e.estado,
                    e.cidade,
                    e.complemento,
                    a.agencia,
                    d.departamento
                    FROM funcionario AS f
                    INNER JOIN endereco AS e ON e.fk_funcionario = f.id_funcionario
                    INNER JOIN agencia AS a ON a.id_agencia = f.fk_agencia
                    INNER JOIN departamento AS d ON d.id_departamento = f.fk_departamento
                    ORDER BY id_funcionario DESC;");
                    $busca = mysqli_query($conexao, $query);
                    while($dados = mysqli_fetch_array($busca)) {       
                        ?>
                <tbody>
                    <tr>
                        <td><?php echo $dados['nome_funcionario']; ?></td>
                        <td><?php echo $dados['cpf']; ?></td>
                        <td><?php echo $dados['data_de_nascimento']; ?></td>
                        <td><?php echo $dados['sexo']; ?></td>
                        <td><?php echo $dados['rua']; ?></td>
                        <td><?php echo $dados['numero']; ?></td>
                        <td><?php echo $dados['bairro']; ?></td>
                        <td><?php echo $dados['cep']; ?></td>
                        <td><?php echo $dados['cidade']; ?></td>
                        <td><?php echo $dados['estado']; ?></td>
                        <td><?php echo $dados['complemento']; ?></td>
                        <td><?php echo $dados['agencia']; ?></td>
                        <td><?php echo $dados['departamento']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="delete_funcionario.php?id_funcionario=<?php echo $dados['id_funcionario'];?>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
        </form>
    </body>
    <script src="./js/index.js"></script>
</html>