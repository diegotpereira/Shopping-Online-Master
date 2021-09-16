<?php
  session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pagamento Sucesso</title>
    </head>
    <body>
        <h2>Bem-Vindo <?php echo $_SESSION['cliente_email']; ?> </h2>
        <h3>O seu pagamento foi Realizado com Sucesso...!</h3>
        <h4><a href="cliente/minha_conta.php">Ir Para sua Conta</a></h4>
    </body>
</html>