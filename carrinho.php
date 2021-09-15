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

    <link rel="stylesheet" href="css/estilo.css" media="all" />
    <!-- <style><?php include 'css/estilo.css'; ?></style> -->

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

                <!-- Chamado o carrinho -->
                <?php carrinho(); ?>

                <div id="carrinho_compras">
                    <span style="float: center; font-size: 18px; padding: 5px; line-height: 40px;">

                    <b style="font-size: 25px;"> Bem-Vindo ! &emsp; &emsp; &emsp; &emsp;</b>

                    &emsp;<i>Total Itens:<?php total_itens(); ?> </i> &emsp;<b>Preço Total:</b><?php precoTotal(); ?>&emsp;
                    <a href="index.php" style="color: yellow; text-decoration: none"><i>Voltar para</i><b>Home &emsp;</b></a>
                    </span>
                </div>

                <div id="produtos_box">
                    <br>
                    <form action="" method="POST" enctype="multipart/form-data">
                       <table align="center" width="700">
                           <tr style="color: blue">
                             <th>Remover</th>
                             <th>Produto(s)</th>
                             <th>Quantidade</th>
                             <th>Preço Total</th>
                           </tr>

                             <?php
                                  $total = 0;

                                  global $data_base;

                                  $ip = getIp();
                                  $sel_preco = "SELECT * FROM carrinho WHERE ip_add = '$ip'";
                                  $run_preco = mysqli_query($data_base, $sel_preco);

                                  while($p_preco = mysqli_fetch_array($run_preco)) {
                                      $pro_id = $p_preco['p_id'];
                                      global $qtd;
                                      $qtd = $p_preco['qtd'];
                                      $pro_preco = "SELECT * FROM produtos WHERE produto_id = '$pro_id'";
                                      $run_pro_preco = mysqli_query($data_base, $pro_preco);

                                      while($pp_preco = mysqli_fetch_array($run_pro_preco)) {
                                          $produto_preco = array($pp_preco['produto_preco']);
                                          $produto_titulo = $pp_preco['produto_titulo'];
                                          $produto_imagem = $pp_preco['produto_imagem'];
                                          $preco_unico = $pp_preco['produto_preco'];

                                          $values = array_sum($produto_preco);
                                          $total += $values;
                             ?>
                             <tr align="center">
                                 <td><br><br><br>
                                 <input type="checkbox" name="remover[]" value="<?php echo $pro_id; ?>"></td>
                                 <td>
                                     <br><?php echo "$produto_titulo"; ?><br>
                                     <img src="admin_area/produto_imagens/<?php echo "$produto_imagem" ?>" width="80" height="80" />
                                 </td>
                                 <td>
                                     <br><br><br>
                                     <input type="number" name="qtd" min="1" size="" value="<?php echo 'SESSION["qtd"]'; ?>" />
                                 </td>

                                 <?php
                                      if(isset($_POST['atualizar_carrinho'])) {
                                          $qtd = $_POST['qtd'];
                                          $atualizar_qtd = "UPDATE carrinho SET qtd = '$qtd'";
                                          $run_qtd = mysqli_query($data_base, $atualizar_qtd);

                                          $_SESSION['qtd'] = $qtd;
                                          (int)$total = (int)$total * (int)$qtd;
                                          (int)$preco_unico = (int)$preco_unico * (int)$qtd;
                                      }
                                 ?>
                                 <td>
                                     <br><br><br>
                                     <?php echo "R$ $preco_unico"; ?>
                                    </br>
                                 </td>
                             </tr>

                             <?php
                                    }
                                }
                             ?>

                             <tr align="center">
                                 <td align="right" colspan="3">
                                     <br><br><br>
                                     <b>Sub Total: </b>
                                 </td>
                                 <td>
                                     <br><br><br>
                                     <?php
                                          echo " R$ $total";
                                     ?>
                                 </td>
                             </tr>

                             <tr align="center">
                                 <td>
                                     <br>
                                     <input type="submit" name="atualizar_carrinho" value="Atualizar Carrinho" />
                                 </td>
                                 <td>
                                     <br>
                                     <input type="submit" name="continuar" value="Continuar Compras">
                                 </td>
                                 <td>
                                     <button><a href="verificar.php" style="text-decoration: none; color:black;">Verificar</a></button>
                                 </td>
                             </tr>
                       </table>
                    </form>

                    <?php
                        // function atualizar_carrinho() {
                            global $data_base;
                            $ip = getIp();

                            if (isset($_POST['atualizar_carrinho'])) {
                                # code...
                                if (isset($_POST['remover'])) {
                                    # code...
                                    foreach($_POST['remover'] as $remove_id) {
                                        $deletar_produto = "DELETE FROM carrinho WHERE p_id = '$remove_id' AND ip_add = '$ip'";
                                        $run_deletar = mysqli_query($data_base, $deletar_produto) or die("consulta não funcionou");

                                        if ($run_deletar) {
                                            # code...
                                            echo "<script>window.open('carrinho.php', '_self')</script>";
                                        }
                                    }
                                }
                            }

                            if (isset($_POST['continuar'])) {
                                # code...
                                echo "<script>window.open('index.php', '_self')</script>";
                            }

                            // echo @$up_carrinho = atualizar_carrinho();
                        // }
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