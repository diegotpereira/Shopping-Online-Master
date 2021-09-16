<br>
<h2 style="text-align: center; color: blue;">Você realmente quer <b>Deletar</b> sua conta?<br><br></h2>

<form action="" method="POST">
    <input style="color: green;" type="submit" name="sim" value="Sim, tenho certeza" />
    &emsp;
    <input style="color: red;" type="submit" name="nao" value="Não, eu estava fora de mim" />
</form>

<?php
    include("includes/dataBase.php");
    global $data_base;
    $usuario = $_SESSION['cliente_email'];

    if (isset($_POST['sim'])) {
        # code...
        $deletar_cliente = "DELETE FROM clientes WHERE cliente_email = '$usuario'";
    }
?>