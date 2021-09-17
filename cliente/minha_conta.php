<?php
 session_start();
 include("funcoes/funcoes.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Online</title>

    <!-- <link rel="stylesheet" href="css/estilo.css" media="all"> -->
    <style><?php include 'css/estilo.css'; ?></style>

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
                <li><a href="cliente/minha_conta.php">Entrar</a></li>
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
                <div id="sidebar_title">Minha Conta</div>
                <ul id="cats">
                    <?php
                        $usuario = $_SESSION['cliente_email'];
                        $get_img = "SELECT * FROM clientes WHERE cliente_email = '$usuario'";
                        $run_img = mysqli_query($data_base, $get_img);
                        $row_img = mysqli_fetch_array($run_img);
                        $c_imagem = $row_img['cliente_imagem'];
                        $c_nome = $row_img['cliente_nome'];

                        echo "<p style='text-align:center;'><img src='cliente_imagens/$c_imagem' width='150' height='150' />";
                    ?>

                    <li><a href="minha_conta.php?meus_pedidos">Meus Pedidos</a></li>
                    <li><a href="minha_conta.php?editar_conta">Editar Conta</a></li>
                    <li><a href="minha_conta.php?alterar_pass">Alterar Senha</a></li>
                    <li><a href="minha_conta.php?deletar_conta">Excluir Conta</a></li>
                </ul>
            </div>

            <div id="content_area">
                  <?php carrinho(); ?>
                <div id="carrinho_compras">
                    <span style="float: left; font-size: 18px; padding: 5px; line-height: 40px;">
                    <?php
                         if (isset($_SESSION['cliente_email'])) {
                             # code...
                             echo "<b>Bem-Vindo &emsp;</b>".$_SESSION['cliente_email'];
                         }
                    ?>
                    <?php
                         if (!isset($_SESSION['cliente_email'])) {
                             # code...
                             echo "<a href='verificar.php' style='color:red; text-decoration:none;'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Entrar</a>";
                         }else {
                             # code...
                             echo "<a href='sair.php' style='color:red; text-decoration:none;'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Sair</a>";
                         }
                    ?>
                    </span>
                </div>

                <div id="produtos_box">
                   <?php
                       if (!isset($_GET['meus_pedidos'])) {
                           # code...
                           if (!isset($_GET['editar_conta'])) {
                               # code...
                               if (!isset($_GET['alterar_pass'])) {
                                   # code...
                                   if (!isset($_GET['deletar_conta'])) {
                                       # code...
                                       echo "<h2> Bem-Vindo $c_nome </h2><br>";
                                       echo "<br> Você pode ver o andamento de seus pedidos clicando aqui <a href='minha_conta.php?meus_pedidos'>link</a></b>";
                                   }
                               }
                           }
                       }
                   ?>

                   <?php
                       if(isset($_GET['editar_conta'])) {
                           include("editar_conta.php");
                       }

                       if (isset($_GET['alterar_pass'])) {
                           # code...
                           include("alterar_pass.php");
                       }

                       if (isset($_GET['deletar_conta'])) {
                           # code...
                           include("deletar_conta.php");
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