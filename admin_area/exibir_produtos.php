<?php
     if (!isset($_SESSION['usuario_email'])) {
         # code...
         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     } else {
         # code...
?>
  <table width="1078" align="center" bgcolor="skyblue">
      <td colspan="6"><h2>Produtos</h2></td>
      <tr align="center" bgcolor="skyblue">
          <th><br>S.N</th>
          <th><br>Titulo</th>
          <th><br>Imagem</th>
          <th><br>Preço</th>
          <th>Editar</th>
          <th><br>Excluir</th>
      </tr>
      <?php
          include("includes/dataBase.php");
          global $data_base;
          $get_pro = "SELECT * FROM produtos";
          $run_pro = mysqli_query($data_base, $get_pro);
          $i = 0;

          while($row_pro = mysqli_fetch_array($run_pro)) {
              $pro_id = $row_pro['produto_id'];
              $pro_titulo = $row_pro['produto_titulo'];
              $pro_imagem = $row_pro['produto_imagem'];
              $pro_preco = $row_pro['produto_preco'];
              $i++;
      ?>
      <tr align="center">
          <td><br><?php echo $i; ?></td>
          <td><br><?php echo $pro_titulo; ?></td>
          <td><br><img src="produto_imagens/<?php echo $pro_imagem; ?>" width="80" height="50" /></td>
          <td><br><?php echo $pro_preco; ?></td>
          <td><br><a href="index.php?editar_produto=<?php echo $pro_id; ?>">Editar</a></td>
          <td><br><a href="deletar_pro.php?deletar_pro = <?php echo $pro_id; ?>">Deletar</a></td>
      </tr>
      <?php } ?>
  </table>
<?php } ?>