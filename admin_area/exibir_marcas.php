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
              <h2><br>Lista de Marcas<br><br></h2>
          </td>
      </tr>
      <tr align="center" bgcolor="skyblue">
          <th><br>S.Nº</th>
          <th><br>Marca Id</th>
          <th><br>Marca Titulo</th>
          <th><br>Editar</th>
          <th><br>Deletar</th>
      </tr>
      <?php
          include("includes/dataBase.php");
          $get_marcas = "SELECT * FROM marcas";
          $run_marca = mysqli_query($data_base, $get_marcas);

          $i = 0;

          while($row_marca = mysqli_fetch_array($run_marca)) {
              $marca_id = $row_marca['marca_id'];
              $marca_titulo = $row_marca['marca_titulo'];

              $i++;
      ?>
      <tr align="center">
          <td><br><?php echo $i; ?></td>
          <td><br><?php echo $marca_id; ?></td>
          <td><br><?php echo $marca_titulo; ?></td>
          <td><br><a href="index.php?editar_marca=<?php echo $marca_id; ?>">Editar</a></td>
          <td><br><a href="deletar_marca.php?deletar_marca = <?php echo $marca_id; ?>">Deletar</a></td>
      </tr>
      <?php } ?>
  </table>
<?php } ?>