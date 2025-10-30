<p>
    <a href="?pg=form_produtos">Cadastrar novo produto</a>
</p>

<h2>Lista de Produtos</h2>
<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM produtos ";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while($dados = mysqli_fetch_array($resultado)) {

            echo "<br>===============<br>";
            echo "ID: $dados[id] | ";
            echo "Nome: $dados[produto] | ";
            echo "Preço: R$ $dados[preco] | ";
            echo "Estoque: $dados[estoque]";
            echo " | <a href='?pg=form_produtos_alterar&id=$dados[id]'>Alterar</a>";
            echo " | <a href='?pg=delete_produtos&id=$dados[id]'>Excluir</a>";
            echo "<br>============= <br>";
        }
    }else{
        echo "<br><h2>Nenhum produto encontrado!</h2><br>";
    }
?>