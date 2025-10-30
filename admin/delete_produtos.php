<?php

    require_once "config.inc.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<h2>Produto excluído com sucesso!</h2>";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    }else{
        echo "<h2>Erro ao excluir o produto!</h2>";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    }
