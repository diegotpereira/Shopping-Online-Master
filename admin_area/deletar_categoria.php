<?php
    if(!isset($_SESSION['user_email']))
    {

    echo "<script> window.open('login.php?not_admin=You are not a admin !','_self') </script>";


    }

    else
    {
?>
<?php
    include("includes/dataBase.php");
    if (isset($_GET['deletar_categoria'])) {
        # code...
        $delete_id = $_GET['deletar_categoria.php'];
        $deletar_categoria = "DELETE FROM categorias WHERE cat_id = '$delete_id'";
        $run_delete = mysqli_query($data_base, $deletar_categoria) or die("Consulta não funciona");

        if ($run_delete) {
            # code...
            echo "<script>alert('Categoria foi deletada..!')</script>";
            echo "<script>window.open('index.php?exibir_categorias', '_self')</script>";
        }
    }
?>
<?php } ?>