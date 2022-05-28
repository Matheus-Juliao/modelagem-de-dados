<?php 
    $id_cliente = $_GET['id_cliente'];
    include_once('config.php');
    $query = ("DELETE FROM tipo_conta WHERE fk_conta in (select numero_conta from conta where fk_cliente = '$id_cliente')");
    mysqli_query($conexao, $query);
    $query = ("DELETE FROM conta WHERE fk_cliente = '$id_cliente'");
    mysqli_query($conexao, $query);
    $query = ("DELETE FROM endereco WHERE fk_cliente = '$id_cliente'");
    mysqli_query($conexao, $query);
    $query = ("DELETE FROM cliente WHERE id_cliente = '$id_cliente'");
    mysqli_query($conexao, $query);
    header("Location: select_cliente_html.php");
?>