<?php
    include("funcoes/funcoes.php");
    session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Online</title>

    <link rel="stylesheet" href="css/estilo.css" media="all" />
    <!-- <style><?php include 'css/estilo.css'; ?></style> -->

</head>
<body>
    <!-- O CONTAINER PRINCIPAL COMEÇA AQUI -->
    <div class="main">
        <!-- O HEADER COMEÇA AQUI -->
        <div class="header">
            <a href="index.php"><img id="logo_image" src="imagens/logo"></a>
            <img id="logo_image" src="imagens/logo1" style="width: 60%;" />
        </div>
        <!-- O HEADER TERMINA AQUI -->

        <!-- BARRA DE NAVEGAÇÃO COMEÇA AQUI -->
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="todos_produtos.php">Produtos</a></li>
                <li><a href="">Conta</a></li>
                <li><a href="">Entrar</a></li>
                <li><a href="carrinho.php">Carrinho de Compras</a></li>
                <li><a href="">Contato</a></li>
            </ul>

            <div id="form">
                <form method="get" action="resultados.php" enctype="multipart/form-data">
                   <input type="text" name="usuario_query" placeholder="Sinta-se à vontade para pesquisar" />
                   <input type="submit" name="buscar" value="buscar" />
                </form>
            </div>
        </div>

        <!-- BARRA DE NAVEGAÇÃO TERMINA AQUI -->

        <!-- A SESSÃO CONTENT COMEÇA AQUI 0-->
        <div class="content">
            <div id="sidebar">
                <div id="sidebar_title">Categorias</div>
                <ul id="cats">
                    <?php 
                        getCategorias();
                    ?>
                </ul>

                <div id="sidebar_title">Marcas</div>
                <ul id="cats">
                    <?php
                       getMarcas();
                    ?>
                </ul>
            </div>

            <div id="content_area">
                  <?php carrinho(); ?>
                <div id="carrinho_compras">
                    <span style="float: center; font-size: 18px; padding: 5px; line-height: 40px;">

                    &emsp;<i>Total Itens: <?php total_itens(); ?> </i> &emsp;<b>Preço Total:</b><?php precoTotal(); ?>&emsp;
                    <a href="carrinho.php" style="color: yellow; text-decoration: none"><i>Ir Para o Carrinho &emsp;</i></a>

                    <?php
                        if (isset($_SESSION['cliente_email'])) {
                            # code...
                            echo "<a href='verificar.php' style='color:red; text-decoration:none;'>Entrar</a>";
                        } else {
                            # code...
                            echo "<a href='sair.php' style='color:red; text-decoration:none'>Sair</a>";
                        }
                        
                    ?>
                    </span>
                </div>

                <div id="produtos_box">
                        <?php
                                if (!isset($_SESSION['cliente_email'])) {
                                    # code...
                                    include("cliente_login.php");
                                } else {
                                    # code...
                                    include("payment.php");
                                }
                            ?>
                
                </div>
            </div>
        </div>
        <!-- SESSÃO CONTENT TERMINA AQUI -->

        <!-- SESSÃO FOOTER  -->
        <div id="footer">
            <h2 style="text-align: center; padding-top: 10px;"><p>Todos os direitos reservados &copy;DTP Software</a> 2021</p></h2>
        </div>
    </div>
</body>
</html>