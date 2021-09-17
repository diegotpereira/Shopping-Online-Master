<h2 style="text-align: center;">Alterar sua Senha</h2>
<form action="" method="POST">
    <table align="center" width="600">
        <tr>
            <td align="right"><b>Digite sua Senha Atual&emsp;</b></td>
            <td><input type="password" name="atual_pass" required><br></td>
        </tr>
        <tr>
            <td align="right"><b>Digite sua Nova Senha&emsp;</b></td>
            <td><input type="password" name="nova_pass" required><br></td>
        </tr>
        <tr>
            <td align="right"><b>Digite sua Senha Novamente&emsp;</b></td>
            <td><input type="password" name="nova_pass_again" required></td>
        </tr>
        <tr align="center">
            <td colspan="3"><br><input type="submit" name="alterar_pass" value="Alterar Senha"></td>
        </tr>
    </table>
</form>
<?php
    global $data_base;
    include("includes/dataBase.php");
    if (isset($_POST['alterar_pass'])) {
        # code...
        $senha_atual = $_POST['atual_pass'];
        $nova_pass = $_POST['nova_pass'];
        $nova_again= $_POST['nova_pass_again'];

        $sel_pass = "SELECT * FROM clientes WHERE cliente_pass = '$senha_atual' AND cliente_email = '$usuario'";
        $run_pass = mysqli_query($data_base, $sel_pass);
        $verificar_pass =  mysqli_num_rows($run_pass);

        if ($verificar_pass == 0) {
            # code...
            echo "<script>alert('Sua Senha Atual está Incorreta...!');</script>";
            exit();
        }

        if ($nova_pass != $nova_again) {
            # code...
            echo "<script>alert('A nova senha não corresponde ..!');</script>";
            exit();
        }else {
            # code...
            $alterar_pass = "UPDATE clientes SET cliente_pass = '$nova_pass' WHERE cliente_email = '$usuario'";
            $run_alterar = mysqli_query($data_base, $alterar_pass);

            echo "<script>alert('Senha atualizada com Sucesso..!');<script>";
            echo "<script>window.open('minha_conta.php', '_self');</script>";
        }
    }
?>