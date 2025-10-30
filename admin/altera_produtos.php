<?php

    require_once "config.inc.php";

    $id = $_POST['id'];
    $nome = $_POST['produto'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "UPDATE produtos SET
            produto = '$produto',
            preco = '$preco',
            estoque = '$estoque'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "Produto alterado com sucesso!";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    }else{
        echo "Houve um erro na alteração.";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    }