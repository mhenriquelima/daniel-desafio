<?php
    require_once "config.inc.php";
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    while ($produto = mysqli_fetch_array($resultado)){
        $id = $produto['id'];
        $nome = $produto['produto'];
        $preco = $produto['preco'];
        $estoque = $produto['estoque'];
    }
?>

<form action="?pg=altera_produtos" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Nome do produto:</label>
    <input type="text" name="produto" value="<?=$nome?>">
    <label>preco:</label>
    <input type="text" name="preco" value="<?=$preco?>">
    <label>estoque:</label>
    <input type="text" name="estoque" value="<?=$estoque?>">
    <input type="submit" value="Cadastrar">
</form>