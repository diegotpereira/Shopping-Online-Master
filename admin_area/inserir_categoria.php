<?php
    if (!isset($_SESSION['usuario_email'])) {
        # code...
        echo  "<script>window.open('login.php?not_admin = Você não é um administrador !', '_self')</script>";
    } else {
        # code...
?>
  <form action="" method="POST" style="padding: 150px; text-align: center; color: red; background-color: white;">
     <b>Inserir Nova Categoria</b>
     <input type="text" name="nova_categoria" required /> &emsp;
     <input type="submit" name="adicionar_categoria" value="Adicionar Categoria" style="color: black; background-color: skyblue;" />
  </form>
  <?php
      include("includes/dataBase.php");
      
      if (isset($_POST['adicionar_categoria'])) {
          # code...
          $nova_categoria = $_POST['nova_categoria'];

          $inserir_categoria = "INSERT INTO categorias (cat_titulo) VALUES ('$nova_categoria')";
          $run_categoria = mysqli_query($data_base, $inserir_categoria);

          if ($run_categoria) {
              # code...
              echo "<script>alert('Nova Categoria adicionada com sucesso..!')</script>";
              echo "<script>window.open('index.php?exibir_categorias','_self')</script>";
          }
      }
  ?>
<?php } ?>