<?php
 include("funcoes/funcoes.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilo.css" media="all" />
    <title>Shopping Online</title>
</head>
<body>
    <!-- O CONTAINER PRINCIPAL COMEÇA AQUI -->
    <div class="main">
        <!-- O HEADER COMEÇA AQUI -->
        <div class="header">
            <a href="index.php"><img id="logo_image" src="imagens/logo" /></a>
            <img id="logo_image" src="imagens/logo1" style="width: 60%" />
        </div>
        <!-- O HEADER TERMINA AQUI -->

        <!-- BARRA DE NAVEGAÇÃO COMEÇA AQUI -->
        <div class="menubar">
            <ul id="menu">
                <li><a href="">Home</a></li>
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

        <!-- A SESSÃO CONTENT COMEÇA AQUI -->
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
                <div id="carrinho_compras">
                    <span style="float: center; font-size: 18px; padding: 5px; line-height: 40px">
                    <b style="font-size: 25px; " >   Bem-Vindo ! &emsp; &emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;</b>

                    Total Itens: &emsp; Preço Total: &emsp;</b>
                    <a href="carrinho.php" style="color: yellow; text-decoration: none">Ir Para o Carrinho &emsp;&emsp;</a>
                    </span>
                </div>

                <div id="produtos_box">
                    <?php
                      echo '<link rel="stylesheet" href="css/estilo.css" media="all" />';

                      global $data_base;

                      $get_pro = "SELECT * FROM produtos";
                      $run_pro = mysqli_query($data_base, $get_pro);

                      while($row_pro = mysqli_fetch_array($run_pro)) {
                          $pro_id = $row_pro['produto_id'];
                          $pro_cat = $row_pro['produto_cat'];
                          $pro_marca = $row_pro['produto_marca'];
                          $pro_titulo = $row_pro['produto_titulo'];
                          $pro_preco = $row_pro['produto_preco'];
                          $pro_imagem = $row_pro[5];

                          echo 
                            "<div id='unico_produto'>
                                <h3>$pro_titulo</h3>
                                <img src='admin_area/produto_imagens/$pro_imagem' width='180' height='180' />
                                <p> R$ <b>$pro_preco</b></p>
                                <a href='detalhes.php?pro_id=$pro_id' style='float:left'>Detalhes</a>
                                <a href='index.php?pro_id=$pro_id'><button style='float:right'>Adicionar ao Carrinho</button></a>
                            </div>";
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