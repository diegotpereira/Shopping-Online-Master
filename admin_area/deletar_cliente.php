<?php
     if (!isset($_SESSION['usuario_email'])) {
         # code...

         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     }else {
         # code...
?>
<?php
    include("includes/dataBase.php");
    if (isset($_GET['deletar_cliente'])) {
        # code...
        $delete_id = $_GET['deletar_cliente'];
        $deletar_cliente = "DELETE FROM clientes WHERE cliente_id = '$delete_id'";
        $run_delete = mysqli_query($data_base, $deletar_cliente) or die("Consulta não funciona");

        if ($run_delete) {
            # code...
            echo "<script>alert('O cliente foi deletado..!')</script>";
            echo "<script>window.open('index.php?exibir_clientes', '_self')</script>";
        }
    }
?>
<?php } ?>