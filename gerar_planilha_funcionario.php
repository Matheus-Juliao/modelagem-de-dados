<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>

        <?php
            $arquivo = "funcionários.xls";
            $html = '';
            $html .= '<table border="1">';
                
            $html .= '<td colspan="13">Planilha Funcionários</td>';
                $html .=  '<tr>';
                    $html .= '<td><b>Nome funcionário</b></td>';
                    $html .= '<td><b>CPF</b></td>';
                    $html .= '<td><b>Data Nascimento</b></td>';
                    $html .= '<td><b>Sexo</b></td>';
                    $html .= '<td><b>Rua</b></td>';
                    $html .= '<td><b>Número</b></td>';
                    $html .= '<td><b>Bairro</b></td>';
                    $html .= '<td><b>Cep</b></td>';
                    $html .= '<td><b>Cidade</b></td>';
                    $html .= '<td><b>Estado</b></td>';
                    $html .= '<td><b>Complemento</b></td>';
                    $html .= '<td><b>Agência</b></td>';
                    $html .= '<td><b>Departamento</b></td>';
                $html .= '</tr>';

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
                    $html .= '<tr>';
                        $html .= '<td>'; $html .= $dados['nome_funcionario']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['cpf']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['data_de_nascimento']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['sexo']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['rua']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['numero']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['bairro']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['cep']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['cidade']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['estado']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['complemento']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['agencia']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['departamento']; $html .= '</td>';
                    $html .= '</tr>';         
                }
            $html .= '</table>';

            // Configurações header para forçar o download
            header ("Expires: Mon, 07 Jul 2016 05:00:00 GMT");
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
            header ("Cache-Control: no-cache, must-revalidate");
            header ("Pragma: no-cache");
            header ("Content-type: application/x-msexcel");
            header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
            header ("Content-Description: PHP Generated Data" );
            // Envia o conteúdo do arquivo
            echo $html;
            exit;
        ?>
    </body>
</html>