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
            $id_departamento = $_POST['departamento'];

            if(empty(true)){
                //echo "Variavel vazia";
                echo "<script>alert('Erro ao enviar dados! Verifique o preenchimento!');";
            } 
            else {
                include_once('config.php'); 
                //echo "Variavel cheia";
                $_SESSION['last_request']  = $request; 
                mysqli_query($conexao, 
                "INSERT INTO funcionario (nome_funcionario, cpf, data_de_nascimento, sexo, fk_agencia, fk_departamento) 
                VALUES ('$nome', '$cpf', '$date', '$sexo', '$id_agencia', '$id_departamento')");

                $result = mysqli_query($conexao, "SELECT id_funcionario FROM funcionario where cpf = '$cpf'");
                $id_funcionario = mysqli_fetch_array($result)[0];

                mysqli_query($conexao, 
                "INSERT INTO endereco (rua, numero, bairro, cep, cidade, estado, complemento, fk_funcionario) 
                VALUES ('$rua', '$numero', '$bairro', '$cep', '$cidade', '$estado', '$complemento', '$id_funcionario')");                
                $_SESSION = array();

                if($_POST) {
                    echo "<script>alert('Dados enviados com Sucesso!');";
                    echo "javascript:window.location='cadastro_funcionario_html.php';</script>";
                } 
            }
            
        }
    }   
?>