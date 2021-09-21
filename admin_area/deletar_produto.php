<?php
    if (!isset($_SESSION['usuario_email'])) {
        # code...
        echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>"; 
    } else {
        # code...
?>
<?php
    include("includes/dataBase.php");
    if (isset($_GET['deletar_produto'])) {
        # code...
        $delete_id = $_GET['deletar_produto'];
        $deletar_produto = "DELETE FROM produto WHERE produto_id = '$delete_id";

        if ($run_delete) {
            # code...
            echo "<script>alert('Produto foi deletado..!')</script>";
            echo "<script>window.open('index.php?exibir_produtos', '_self')</script>";
        }
    }
?>
<?php } ?>;