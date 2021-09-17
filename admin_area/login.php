<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="css/loginEstilo.css" media="all">
    </head>
    <body>
        <div class="login">
            <h2 style="color: white; text-align: center;"><?php echo @$_GET['logged_out']; ?></h2>
            <h1>Administraor Login</h1>
            <form method="POST" action="login.php">
                <input type="text" name="email" id="" placeholder="Digite seu Email" required = "required" />
                <input type="password" name="password" placeholder="Digite sua Senha" required = "required" id="" />
                <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Entrar</button>
            </form>
        </div>
    </body>
</html>
<?php
    session_start();
    include("includes/dataBase.php");
    global $data_base;

    if (isset($_POST['login'])) {
        # code...
        $email = mysqli_real_escape_string($data_base, $_POST['email']);
        $pass = mysqli_real_escape_string($data_base, $_POST['password']);

        $Sel_usuario = "SELECT * FROM admins WHERE usuario_email = '$email' AND usuario_pass = '$pass'";
        $run_usuario = mysqli_query($data_base, $Sel_usuario);
        $verificar_usuario = mysqli_num_rows($run_usuario);

        if ($verificar_usuario == 0) {
            # code...
            echo "<script> alert('Senha ou Email Inválidos!')</script>";
        } else {
            # code...
            $_SESSION['usuario_email'] = $email;
            echo "<script>window.open('index.php?logged_in = Você entrou com Sucesso..!', '_self')</script>";
        }
        
    }
?>