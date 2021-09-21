<?php
    if (!isset($_SESSION['usuario_email'])) {
        # code...
        echo  "<script>window.open('login.php?not_admin = Você não é um administrador !', '_self')</script>";
    } else {
        # code...
?>
<?php
      include("includes/dataBase.php");
      
      if (isset($_GET['editar_categoria'])) {
          # code...
          $cat_id = $_GET['editar_categoria'];

          $get_cat = "SELECT * FROM categorias WHERE cat_id = '$cat_id'";
          $run_categoria = mysqli_query($data_base, $get_cat);
          $row_cat = mysqli_fetch_array($run_categoria);

          $cat_id = $row_cat['cat_id'];
          $cat_titulo = $row_cat['cat_titulo'];
      }
  ?>
  <form action="" method="POST" style="padding: 150px; text-align: center; color: red; background-color: white;">
     <b>Editar Categoria</b> &emsp; 
     <input type="text" name="nova_categoria" value="<?php echo $cat_titulo; ?>" /> &emsp;
     <input type="submit" name="atualizar_categoria" value="Atualizar Categoria" style="color: black; background-color: skyblue;" />
  </form>
  <?php
      include("includes/dataBase.php");
      if (isset($_POST['atualizar_categoria'])) {
          # code...
          $atualizar_id = $cat_id;
          $nova_categoria =$_POST['nova_categoria'];
          $atualizar_categoria = "UPDATE categorias SET cat_titulo = '$nova_categoria' WHERE cat_id = '$atualizar_id'";
          $run_categoria = mysqli_query($data_base, $atualizar_categoria);

          if ($run_categoria) {
              # code...
              echo "<script>alert('Categoria Atualizada com Sucesso..!')</script>";
              echo "<script>window.open('index.php?exibir_categorias', '_self')</script>";
          }
      }
  ?>
<?php } ?>