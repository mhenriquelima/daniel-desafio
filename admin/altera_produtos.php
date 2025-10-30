<?php

    require_once "config.inc.php";
    // Ensure this script is reached via POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Requisição inválida.";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
        exit;
    }

    // Basic validation/sanitization
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        echo "ID inválido.";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
        exit;
    }

    $id = (int) $_POST['id'];
    $produto = isset($_POST['produto']) ? $_POST['produto'] : '';
    $preco = isset($_POST['preco']) ? $_POST['preco'] : '0';
    $estoque = isset($_POST['estoque']) ? (int) $_POST['estoque'] : 0;

    // Use prepared statement to avoid SQL injection and fix variable mismatch
    $stmt = mysqli_prepare($conexao, "UPDATE produtos SET produto = ?, preco = ?, estoque = ? WHERE id = ?");
    if (!$stmt) {
        echo "Erro ao preparar consulta: " . mysqli_error($conexao);
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
        exit;
    }

    $preco_val = (float) $preco;
    mysqli_stmt_bind_param($stmt, 'sdii', $produto, $preco_val, $estoque, $id);
    $executed = mysqli_stmt_execute($stmt);

    if ($executed) {
        echo "Produto alterado com sucesso!";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    } else {
        echo "Houve um erro na alteração: " . mysqli_stmt_error($stmt);
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    }

    mysqli_stmt_close($stmt);