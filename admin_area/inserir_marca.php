<?php
     if (!isset($_SESSION['usuario_email'])) {
         # code...

         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     }else {
         # code...
?>
<form action="" method="POST" style="padding: 150px; text-align: center; color: red; background-color: white;">
   <b>Inserir Nova Marca: </b>
   <input type="text" name="nova_marca" required /> &emsp;
   <input type="submit" name="adicionar_marca" value="Adicionar Marca" style="color: black; background-color: skyblue;" />
</form>
<?php
    include("includes/dataBase.php");
    if (isset($_POST['adicionar_marca'])) {
        # code...
        $nova_marca = $_POST['nova_marca'];
        $inserir_marca = "INSERT INTO marcas (marca_titulo) VALUES ('$nova_marca')";
        $run_marca = mysqli_query($data_base, $inserir_marca);

        if ($run_marca) {
            # code...
            echo "<script>alert('Nova Marca Inserida com Sucesso..!')";
            echo "<script>window.open('index.php?exibir_marcas','_self')";
        }
    }
?>
<?php } ?>