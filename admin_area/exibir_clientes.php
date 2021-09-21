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
              <h2>Lista de Clientes</h2>
          </td>
      </tr>
      <tr align="center" bgcolor="skyblue">
          <th><br>S.Nº</th>
          <th><br>Nome</th>
          <th><br>Email</th>
          <th><br>Imagem</th>
          <th><br>Deletar</th>
      </tr>
      <?php
          include("includes/dataBase.php");
          $get_cliente = "SELECT * FROM clientes";
          $run_cliente = mysqli_query($data_base, $get_cliente);
          $i = 0;

          while($row_cliente = mysqli_fetch_array($run_cliente)) {
              $cliente_id = $row_cliente['cliente_id'];
              $cliente_nome = $row_cliente['cliente_nome'];
              $cliente_email = $row_cliente['cliente_email'];
              $cliente_imagem = $row_cliente['cliente_imagem'];
              $i++;
      ?>
      <tr align="center">
          <td><br><?php echo $i; ?></td>
          <td><br><?php echo $cliente_nome; ?></td>
          <td><br><?php echo $cliente_email; ?></td>
          <td><br><img src="../cliente/cliente_imagens/<?php echo $cliente_imagem; ?>" width="60" height="50" /></td>
          <td><br><a href="deletar_cliente.php?deletar_cliente=<?php echo $cliente_id; ?>">Deletar</a></td>
      </tr>
      <?php } ?>
  </table>
<?php } ?>