<?php
     session_start();
     if (!isset($_SESSION['usuario_email'])) {
         # code...

         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     }else {
         # code...
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/estilo.css" media="all" />
        <title>Painel do Administrador</title>
    </head>
    <body>
        <div class="main_wrapper">
            <img src="imagens/head" height="99px" width="1352">
            <div id="header"></div>
            <div id="right">
                <h2 style="text-align: center; color: yellow;">Gerenciar Conteúdo</h2>
                <a href="index.php?inserir_produto">Inserir Produto</a>
                <a href="index.php?exibir_produtos">Exibir Produto</a>
                <a href="index.php?inserir_categoria">Inserir Categoria</a>
                <a href="index.php?exibir_categoria">Exibir Todas Categorias</a>
                <a href="index.php?inserir_marcas">Inserir Nova Marca</a>
                <a href="index.php?exibir_marcas">Exibir Todas Marcas</a>
                <a href="index.php?exibir_clientes">Exibir Clientes</a>
                <a href="index.php?exibir_pedidos">Exibir Pedidos</a>
                <a href="index.php?exibir_pagamentos">Exibir Pagamentos</a>
                <a href="sair.php?">Administrador Sair</a>
            </div>
            <div id="left">
                <h2 style="color: red; text-align: center;"><?php echo @$_GET['logged_in']; ?></h2>
                <?php
                    if (isset($_GET['inserir_produto'])) {
                        # code...
                        include("inserir_produto.php");
                    }
                    if (isset($_GET['exibir_produtos'])) {
                        # code...
                        include("exibir_produtos.php");
                    }
                    if (isset($_GET['editar_produto'])) {
                        # code...
                        include("editar_produto.php");
                    }
                    if (isset($_GET['inserir_categoria'])) {
                        # code...
                        include("inserir_categoria.php");
                    }
                    if (isset($_GET['exibir_categoria'])) {
                        # code...
                        include("exibir_categoria.php");
                    }
                    if (isset($_GET['editar_cat'])) {
                        # code...
                        include("editar_cat.php");
                    }
                    if (isset($_GET['inserir_marca'])) {
                        # code...
                        include("inserir_marca.php");
                    }
                    if (isset($_GET['exibir_marcas'])) {
                        # code...
                        include("exibir_marcas.php");
                    }
                    if (isset($_GET['editar_marca'])) {
                        # code...
                        include("editar_marca.php");
                    }
                    if (isset($_GET['exibir_clientes'])) {
                        # code...
                        include("exibir_clientes.php");
                    }
                ?>
            </div>
        </div>
    </body>
</html>
<?php } ?>