<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>

        <?php
            $arquivo = "clientes.xls";
            $html = '';
            $html .= '<table border="1">';
                
            $html .= '<td colspan="14">Planilha Clientes</td>';
                $html .=  '<tr>';
                    $html .= '<td><b>Nome cliente</b></td>';
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
                    $html .= '<td><b>Número da Conta</b></td>';
                    $html .= '<td><b>Tipo da Conta</b></td>';
                $html .= '</tr>';

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
                INNER JOIN tipo_de_conta AS tc ON tc.id_tipo = t.fk_tipo 
                ORDER BY id_cliente DESC;");
                $busca = mysqli_query($conexao, $query);
                while($dados = mysqli_fetch_array($busca)) {   
                    $html .= '<tr>';
                        $html .= '<td>'; $html .= $dados['nome_cliente']; $html .= '</td>';
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
                        $html .= '<td>'; $html .= $dados['numero_conta']; $html .= '</td>';
                        $html .= '<td>'; $html .= $dados['tipo']; $html .= '</td>';
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