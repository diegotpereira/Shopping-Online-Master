<?php
    if (!isset($_SESSION['usuario_email'])) {
        # code...
        echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
    }else {
        # code...
?>
  <table width="1078" align="center" bgcolor="skyblue">
      <tr align="center">
          <td colspan="6">
              <h2><br>Lista de Categorias<br><br></h2>
          </td>
      </tr>
      <tr align="center" bgcolor="skyblue">
          <th><br>S.Nº</th>
          <th><br>Categoria Id</th>
          <th><br>Categoria Titulo</th>
          <th><br>Editar</th>
          <th><br>Deletar</th>
      </tr>
      <?php
          include("includes/dataBase.php");

          $get_cat = "SELECT * FROM categorias";
          $run_cat = mysqli_query($data_base, $get_cat);

          $i = 0;

          while($row_cat = mysqli_fetch_array($run_cat)) {
              $cat_id = $row_cat['cat_id'];
              $cat_titulo = $row_cat['cat_titulo'];

              $i++;
      ?>
      <tr align="center">
          <td><br><?php echo $i; ?></td>
          <td><br><?php echo $cat_id; ?></td>
          <td><br><?php echo $cat_titulo; ?></td>
          <td><br><a href="index.php?editar_categoria=<?php echo $cat_id; ?>">Editar</a></td>
          <td><br><a href="deletar_categoria.php?deletar_categoria=<?php echo $cat_id; ?>">Deletar</a></td>
      </tr>
      <?php } ?>
  </table>
<?php } ?>