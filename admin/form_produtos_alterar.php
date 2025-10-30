<?php
    require_once "config.inc.php";
    // Validate incoming id to avoid undefined index notices
    if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
        echo "ID do produto não fornecido ou inválido.";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
        exit;
    }

    $id = (int) $_REQUEST['id'];
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "Erro ao buscar produto: " . mysqli_error($conexao);
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
        exit;
    }

    $produto = mysqli_fetch_assoc($resultado);
    if (!$produto) {
        echo "Produto não encontrado.";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
        exit;
    }

    $id = $produto['id'];
    $nome = $produto['produto'];
    $preco = $produto['preco'];
    $estoque = $produto['estoque'];
?>

<form action="?pg=altera_produtos" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Nome do produto:</label>
    <input type="text" name="produto" value="<?=htmlspecialchars($nome)?>">
    <label>preco:</label>
    <input type="text" name="preco" value="<?=htmlspecialchars($preco)?>">
    <label>estoque:</label>
    <input type="text" name="estoque" value="<?=htmlspecialchars($estoque)?>">
    <input type="submit" value="Alterar Produto">
</form>