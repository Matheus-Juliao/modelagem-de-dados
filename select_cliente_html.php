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

        <form class="container formCli" action="select_cliente_html.php" method="GET" style="margin-left: 0;">
            <div class="form-group">
                <h1>Cadastro Bancário - Tabela Clientes</h1>
            </div>
            <div class="form-group">
                <h3>Dados Pessoais</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome cliente</th>
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
                        <th scope="col">Número da Conta</th>
                        <th scope="col">Tipo da Conta</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <?php
                    require("config.php");
                    $query = ("SELECT 
                    c.id_cliente,
                    c.nome_cliente,
                    c.cpf,
                    c.data_de_nascimento,
                    c.sexo,
                    e.id_endereco,
                    e.rua,
                    e.numero,
                    e.bairro,
                    e.cep,
                    e.cidade,
                    e.estado,
                    e.complemento,
                    con.numero_conta,
                    con.digito_conta,
                    a.agencia,
                    t.id_tipo_de_conta,
                    tc.tipo
                    FROM cliente AS c
                    INNER JOIN conta AS con ON con.fk_cliente = c.id_cliente
                    INNER JOIN endereco AS e ON e.fk_cliente = c.id_cliente
                    INNER JOIN tipo_conta AS t ON t.fk_conta = con.numero_conta
                    INNER JOIN agencia AS a ON a.id_agencia = t.fk_agencia
                    INNER JOIN tipo_de_conta AS tc ON tc.id_tipo = t.fk_tipo;");
                    $busca = mysqli_query($conexao, $query);
                    while($dados = mysqli_fetch_array($busca)) {       
                        ?>
                <tbody>
                    <tr>
                        <td><?php echo $dados['nome_cliente']; ?></td>
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
                        <td>000<?php echo $dados['numero_conta']; ?>-<?php echo $dados['digito_conta']; ?></td>
                        <td><?php echo $dados['tipo']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="delete_cliente.php?id_cliente=<?php echo $dados['id_cliente'];?>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
        </form>
    </body>
    <script src="./js/alert.js"></script>
</html>