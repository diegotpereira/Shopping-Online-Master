<?php
    include("includes/dataBase.php");

    $usuario = $_SESSION['cliente_email'];

    $get_cliente = "SELECT * FROM clientes WHERE cliente_email = '$usuario'";
    $run_cliente = mysqli_query($data_base, $get_cliente);
    $row_cliente = mysqli_fetch_array($run_cliente);

    $c_id = $row_cliente['cliente_id'];
    $nome = $row_cliente['cliente_nome'];
    $email = $row_cliente['cliente_email'];
    $pass = $row_cliente['cliente_pass'];
    $pais = $row_cliente['cliente_pais'];
    $cidade = $row_cliente['cliente_cidade'];
    $contato = $row_cliente['cliente_contato'];
    $endereco = $row_cliente['cliente_endereco'];
    $imagem = $row_cliente['cliente_imagem'];
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <style><?php include 'css/estilo.css'; ?></style> 

    <title>Shopping Online</title>

</head>
<body>
    
        <div id="registro">
            <form action="" method="POST" enctype="multipart/form-data">
               <table align="center" width="750">
                   <tr>
                       <br>
                       <td colspan="2" align="center" style="color: red;"><h2>Atualizar Conta</h2></td>
                   </tr>

                   <tr>
                       <td align="right"><br>Nome: </td>
                       <td><br><input type="text" name="c_nome" value="<?php echo $nome; ?>" required></td>
                   </tr>
                   <tr>
                       <td align="right">Email: </td>
                       <td><input type="text" name="c_email" value="<?php echo $email; ?>" required></td>
                   </tr>
                   <tr>
                       <td align="right">Senha: </td>
                       <td><input type="password" name="c_pass" value="<?php echo $pass; ?>" required></td>
                   </tr>
                   <tr>
                       <td align="right">Imagem: </td>
                       <td><input type="file" name="c_imagem"><img src="cliente_imagens/<?php echo $imagem; ?>" width="80px;" height="80px;"/></td>
                   </tr>
                   <tr>
                       <td align="right">País: </td>
                       <td>
                           <select name="c_pais" disabled="">
                               <option><?php echo $pais; ?></option>
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
                       <td><input type="text" name="c_cidade" value="<?php echo $cidade; ?>"></td>
                   </tr>
                   <tr>
                       <td align="right">Contato: </td>
                       <td><input type="text" name="c_contato" value="<?php echo $contato; ?>" required></td>
                   </tr>
                   <tr>
                       <td align="right">Endereço: </td>
                       <td><input type="text" name="c_endereco" value="<?php echo $endereco; ?>" /></td>
                   </tr>
                   <tr align="center">
                       <td colspan="2"><br><input type="submit" name="registro" value="Atualizar Conta"></td>
                   </tr>
               </table>
            </form>
        </div>
<?php
    if (isset($_POST['atualizar'])) {
        # code...
        $ip = getIp();

        $cliente_id  = $c_id;
        $c_nome = $_POST['c_nome'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_imagem = $_FILES['c_imagem']['nome'];
        $c_imagem_tmp = $_FILES['c_imagem']['tmp_nome'];
        $c_pais = $_POST['c_pais'];
        $c_cidade = $_POST['c_cidade'];
        $c_contato = $_POST['c_contato'];
        $c_endereco = $_POST['c_endereco'];

        move_uploaded_file($c_imagem_tmp, "cliente_imagens/$c_imagem");

        $atualizar_cliente = "UPDATE clientes SET cliente_nome = '$c_nome', Cliente_email = '$c_email', cliente_pass = '$c_pass', cliente_pais = '$c_pais', cliente_cidade = '$c_cidade', cliente_contato = '$c_contato', cliente_endereco = '$c_endereco', cliente_imagem = '$c_imagem' WHERE cliente_id =  '$cliente_id'";

        $run_atualizar = mysqli_query($data_base, $atualizar_cliente);

        if ($run_atualizar) {
            # code...
            echo "<script> alert('Sua Conta foi Atualizada com Sucesso...!')</script>";
            echo "<script>window.open('minha_conta.php', '_self')</script>";
        }
    }
?>