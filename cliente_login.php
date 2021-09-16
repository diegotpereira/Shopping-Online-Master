<?php
    include("includes/dataBase.php");
?>
        <div id="cliente_login">
            <link rel="stylesheet" href="css/estilo.css" media="all">
            <form action="" method="POST">
               <table align="center" width="700">
                   <tr align="center">
                       <td colspan="4"><br><br> <h2><i>Entrar &emsp; </i> <b>OU</b> &emsp;<i>Cadastrar</i></h2></td>
                   </tr>

                   <tr>
                       <td align="right"><br><br><br><b>Email:</b></td>
                       <td><br><br><input type="text" name="email" placeholder="Digite seu email" required></td>
                   </tr>

                   <tr>
                       <td align="right"><br><br><br><b>Senha:</b></td>
                       <td><br><br><input type="password" name="pass" placeholder="Digite sua Senha" required></td>
                   </tr>

                   <tr align="right">
                       <td><a href="verificar.php?esqueceu_pass">Esqueceu sua senha</a></td>

                       <td align="center"><input type="submit" name="login" value="Entrar" /></td>
                   </tr>
               </table>
               <h3 style="float: center; padding: 25px;"><a href="cliente_registro.php">Novo? Cadastrar Aqui</a></h3>
            </form>

<?php
    if (isset($_POST['login'])) {
        # code...
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];

        $seleciona_cliente = "SELECT * FROM clientes WHERE cliente_pass = '$c_pass' AND cliente_email = '$c_email'";

        $run_cliente = mysqli_query($data_base, $seleciona_cliente);

        $checar_cliente = mysqli_num_rows($run_cliente);

        if ($checar_cliente == 0) {
            # code...
            echo "<script> alert('Email ou Senha Incorretos, Tente Novamente...!')</script>";
            exit();
        }
        $ip = getIp();
        $selecione_carrinho = "SELECT * FROM carrinho WHERE ip_add = '$ip'";
        $run_carrinho = mysqli_query($data_base, $selecione_carrinho);
        $checar_carrinho = mysqli_num_rows($run_carrinho);

        if ($checar_cliente > 0 AND $checar_carrinho == 0) {
            # code...
            $_SESSION['cliente_email'] = $c_email;
            echo "<script> alert('Você se conectou com sucesso ...!')</script>";
            echo "<script>window.open('cliente/minha_conta.php','_self')</script>";
        } else {
            # code...
            $_SESSION['cliente_email'] = $c_email;
            echo "<script> alert('Você se conectou com sucesso ...!')</script>";
        }
        
    }
?>

        </div>