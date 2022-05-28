<?php 
    $id_funcionario = $_GET['id_funcionario'];
    include_once('config.php');
    $query = ("DELETE FROM endereco WHERE fk_funcionario = '$id_funcionario'");
    mysqli_query($conexao, $query);
    $query = ("DELETE FROM funcionario WHERE id_funcionario = '$id_funcionario'");
    mysqli_query($conexao, $query);
    header("Location: select_funcionario_html.php");
?>