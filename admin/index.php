<?php
    echo "Painel administrativo";
?>

<nav>
    <a href="index.php">Inicio</a>
    <a href="?pg=admin_clientes">Clientes</a>
    <a href="?pg=admin_paginas">Administra Páginas</a>
    <a href="?pg=admin_contato">Administrar Contatos</a>
    <a href="?pg=admin_produtos">Produtos</a>
</nav>
<?php
    // Conteúdo
    if(empty($_SERVER["QUERY_STRING"])){
       echo "<h3>Bem-vindo ao painel admin.";
    }elseif($_GET['pg']){
        $pg = $_GET['pg'];
        include_once "$pg.php";
    }else{
        echo "Página não encontrada";
    }
?>
