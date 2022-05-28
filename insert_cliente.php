<?php
    session_start();
    if( $_SERVER['REQUEST_METHOD']=='POST' ) {
        $request = md5( implode( $_POST ) );   
        if( isset( $_SESSION['last_request'] ) && $_SESSION['last_request']== $request ) {
            //echo 'refresh';
        }
        else {
            //echo 'post';
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $date = $_POST['date'];
            $sexo = $_POST['sexo'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cep = $_POST['cep'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $complemento = $_POST['complemento'];
            $id_agencia = $_POST['agencia'];
            $id_tipo = $_POST['tipo'];

            if(empty(true)){
                //echo "Variavel vazia";
                echo "<script>alert('Erro ao enviar dados! Verifique o preenchimento!');";
            } 
            else {
                include_once('config.php'); 
                //echo "Variavel cheia";
                $_SESSION['last_request']  = $request; 
                mysqli_query($conexao, 
                "INSERT INTO cliente (nome_cliente, cpf, data_de_nascimento, sexo) 
                VALUES ('$nome', '$cpf', '$date', '$sexo')");

                $result = mysqli_query($conexao, "SELECT id_cliente FROM cliente where cpf = '$cpf'");
                $id_cliente = mysqli_fetch_array($result)[0];

                mysqli_query($conexao, 
                "INSERT INTO endereco (rua, numero, bairro, cep, cidade, estado, complemento, fk_cliente) 
                VALUES ('$rua', '$numero', '$bairro', '$cep', '$cidade', '$estado', '$complemento', '$id_cliente')"); 

                mysqli_query($conexao, "INSERT INTO conta (digito_conta, fk_cliente) 
                VALUES (0, '$id_cliente')");

                $result = mysqli_query($conexao, "SELECT numero_conta FROM conta where fk_cliente = '$id_cliente'");
                $numero_conta = mysqli_fetch_array($result)[0];

                mysqli_query($conexao, "INSERT INTO tipo_conta (fk_tipo, fk_conta, fk_agencia) 
                VALUES ('$id_tipo', '$numero_conta', '$id_agencia')");            
              
                $_SESSION = array();
                
                if($_POST) {
                    echo "<script>alert('Dados enviados com Sucesso!');";
                    echo "javascript:window.location='cadastro_cliente_html.php';</script>";
                } 
            }  
        }
    }    
?>