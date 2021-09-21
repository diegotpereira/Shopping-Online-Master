<?php
     if (!isset($_SESSION['usuario_email'])) {
         # code...

         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     }else {
         # code...
?>
<?php
    include("includes/dataBase.php");
    if (isset($_GET['editar_marca'])) {
        # code...
        $marca_id = $_GET['editar_marca'];
        $get_marca = "SELECT * FROM marcas WHERE marca_id = '$marca_id'";
        $run_marca = mysqli_query($data_base, $get_marca);
        $row_marca = mysqli_fetch_array($run_marca);

        $marca_id = $row_marca['marca_id'];
        $marca_titulo = $row_marca['marca_titulo'];
    }
?>
<form action="" method="POST" style="padding: 150px; text-align: center; color: red; background-color: white;">
   <b>Atualizar Marca: </b> &emsp;
   <input type="text" name="nova_marca" value="<?php echo $marca_titulo; ?>" /> &emsp;
   <input type="submit" name="atualizar_marca" value="Atualizar Marca" style="color: black; background-color: skyblue;" />
</form>
<?php
    if (isset($_POST['atualizar_marca'])) {
        # code...
        $atualizar_id = $marca_id;
        $nova_marca = $_POST['nova_marca'];
        $atualizar_marca = "UPDATE marcas SET marca_titulo = '$nova_marca' WHERE marca_id = '$atualizar_id'";
        $run_marca = mysqli_query($data_base, $atualizar_marca);

        if ($run_marca) {
            # code...
            echo "<script>alert('Marca atualizada com Sucesso..!')</script>";
            echo "<script> window.open('index.php?exibir_marcas', '_self')</script>";
        }
    }
?>
<?php } ?>