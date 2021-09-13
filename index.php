<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilo.css">
    <title>Shopping Online</title>
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
        <div class="menuBar">
            <ul id="menu">
                <li><a href="">Home</a></li>
                <li><a href="">Produtos</a></li>
                <li><a href="">Conta</a></li>
                <li><a href="">Entrar</a></li>
                <li><a href="">Carrinho de Compras</a></li>
                <li><a href="">Contato</a></li>
            </ul>

            <div id="form">
                <form method="get" action="" enctype="multipart/form-data">
                   <input type="text" name="" placeholder="" />
                   <input type="submit" name="buscar" value="buscar" />
                </form>
            </div>
        </div>

        <!-- BARRA DE NAVEGAÇÃO TERMINA AQUI -->

        <!-- A SESSÃO CONTENT COMEÇA AQUI -->
        <div class="content">
            <div id="sidebar">
                <div id="sidebar_title">Categorias</div>
                <ul id="gatos">

                </ul>

                <div id="sidebar_title">Marcas</div>
                <ul id="gatos">

                </ul>
            </div>

            <div id="content_area">
                <div id="carrinho_compras">
                    <span style="float: center; font-size: 18px; padding: 5px; line-height: 40px;">

                    <i>Total Itens: </i><b>Preço Tota:</b>
                    <a href="#" style="color: yellow; text-decoration: none"><i>Ir Para o Carrinho</i></a>
                    </span>
                </div>

                <div id="produtos_box">

                </div>
            </div>
        </div>
        <!-- SESSÃO CONTENT TERMINA AQUI -->

        <!-- SESSÃO FOOTER  -->
        <div id="footer">
            <h2 style="text-align: center; padding-top: 10px;"><p>Todos os direitos reservados &copy;>DTP Software</a> 2021</p></h2>
        </div>
    </div>
</body>
</html>