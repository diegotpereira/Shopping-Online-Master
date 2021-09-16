<?php
    session_start();
    include("funcoes/funcoes.php");
    include("includes/dataBase.php");
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
                    </span>
                </div>
            </div>
        </div>
        <!-- SESSÃO CONTENT TERMINA AQUI -->

        <div id="registro">
            <form action="cliente_registro.php" method="POST" enctype="multipart/form-data">
               <table align="center" width="750">
                   <tr>
                       <br>
                       <td colspan="2" align="center" style="color: red;"><h2>Criar uma Conta</h2></td>
                   </tr>

                   <tr>
                       <td align="right"><br>Nome: </td>
                       <td><br><input type="text" name="c_nome" required></td>
                   </tr>
                   <tr>
                       <td align="right">Email: </td>
                       <td><input type="text" name="c_email" required></td>
                   </tr>
                   <tr>
                       <td align="right">Senha: </td>
                       <td><input type="password" name="c_pass" required></td>
                   </tr>
                   <tr>
                       <td align="right">Imagem: </td>
                       <td><input type="file" name="c_imagem" required></td>
                   </tr>
                   <tr>
                       <td align="right">País: </td>
                       <td>
                           <select name="c_pais" required="">
                               <option>Selecione um país</option>
                               <option>Brasil</option>
                               <option>Argentina</option>
                               <option>Chile</option>
                               <option>Uruguai</option>
                               <option>Paraguai</option>
                               <option>Australia</option>
            				   <option>China</option>
            				   <option>India</option>
                               <option>Russia</option>
            				   <option>Israel</option>
                               <option>Estados Unidos</option>
                           </select>
                       </td>
                   </tr>
                   <tr>
                       <td align="right">Cidade: </td>
                       <td><input type="text" name="c_cidade"></td>
                   </tr>
                   <tr>
                       <td align="right">Contato: </td>
                       <td><input type="text" name="c_contato" required></td>
                   </tr>
                   <tr>
                       <td align="right">Endereço: </td>
                       <td><textarea cols="20" rows="1" name="c_endereco"></textarea></td>
                   </tr>
                   <tr align="center">
                       <td colspan="2"><input type="submit" name="registro" value="Cria Conta"></td>
                   </tr>
               </table>
            </form>
        </div>

        <!-- SESSÃO FOOTER  -->
        <div id="footer">
            <h2 style="text-align: center; padding-top: 10px;"><p>Todos os direitos reservados &copy;DTP Software</a> 2021</p></h2>
        </div>
    </div>
</body>
</html>

<?php
    if (isset($_POST['registro'])) {
        # code...
        $ip = getIp();
        $c_nome = $_POST['c_nome'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_imagem = $_FILES['c_imagem']['nome'];
        $c_imagem_tmp = $_FILES['c_imagem']['tmp_nome'];
        $c_pais = $_POST['c_pais'];
        $c_cidade = $_POST['c_cidade'];
        $c_contato = $_POST['c_contato'];
        $c_endereco = $_POST['c_endereco'];

        move_uploaded_file($c_imagem_tmp, "cliente/cliente_imagens/$c_imagem");

        $inserir_cliente = "INSERT INTO clientes(cliente_ip, cliente_nome, Cliente_email, cliente_pass, cliente_pais, cliente_cidade, cliente_contato, cliente_endereco, cliente_imagem) VALUES ('$ip', '$c_nome', '$c_email', '$c_pass', '$c_pais', '$c_cidade', '$c_contato', '$c_endereco', '$c_imagem')";

        $run_cliente = mysqli_query($data_base, $inserir_cliente);

        $seleciona_carrinho = "SELECT * FROM carrinho WHERE ip_add = '$ip'";

        $run_carrinho = mysqli_query($data_base, $seleciona_carrinho);

        $checar_carrinho = mysqli_num_rows($run_carrinho);

        if ($checar_carrinho == 0) {
            # code...
            $_SESSION['cliente_email'] = $c_email;

            echo "<script> alert('Conta Criado com Sucesso...!')</script>";
            echo "<script>window.open('cliente/minha_conta.php', '_self')</script>";

        } else {
            # code...
            $_SESSION['cliente_email'] = $c_email;
            echo "<script> alert('Conta Criado com Sucesso...!')</script>";
            echo "<script>window.open('verificar.php', '_self')</script>";
        }
        
    }
?>