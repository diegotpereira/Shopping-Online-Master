<?php
     if (!isset($_SESSION['usuario_email'])) {
         # code...
         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     }else {
         # code...     
?>

<!DOCTYPE html>
<?php
    include("includes/dataBase.php");
    if (isset($_GET['editar_produto'])) {
        # code...
        $get_id = $_GET['editar_produto'];
        $get_produto = "SELECT * FROM produtos WHERE produto_id = '$get_id'";
        $run_produto = mysqli_query($data_base, $get_produto);
        $row_produto = mysqli_fetch_array($run_produto);

        $pro_id = $row_produto['produto_id'];
        $pro_titulo = $row_produto['produto_titulo'];
        $pro_imagem = $row_produto['produto_imagem'];
        $pro_preco = $row_produto['produto_preco'];
        $pro_desc = $row_produto['produto_desc'];
        $pro_keywords = $row_produto['produto_keywords'];
        $pro_cat = $row_produto['produto_cat'];
        $pro_marca = $row_produto['produto_marca'];

        $get_cat =  "SELECT * FROM categorias WHERE cat_id = '$pro_cat'";
        $run_cat = mysqli_query($data_base, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $categoria_titulo = $row_cat['cat_titulo'];

        $get_marca = "SELECT * FROM marcas WHERE marca_id = '$pro_marca'";
        $run_marca = mysqli_query($data_base, $get_marca);
        $row_marca = mysqli_fetch_array($run_marca);
        $marca_titulo = $row_marca['marca_titulo'];
    }
?>
<html>
    <head>
    <!-- O CÓDIGO JAVASCRIPT PARA COMBINAR A TEXTAREA COM O EDITOR DE TEXTO precisa de conectividade com a Internet -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>

    <title>Painel do Administrador</title>
    </head>
    <body bgcolor="skyblue">
        <form action="" method="POST" enctype="multipart/form-data">
           <table align="center" width="1077" heigth="622" border="10" bgcolor="#187eae">
               <tr align="center">
                   <td colspan="2" style="padding-top: 1opx;"><h2>Editar Produtos</h2></td>
               </tr>
               <tr>
                   <td align="right">Produto titulo: </td>
                   <td align="left"><input type="text" name="produto_titulo" value="<?php echo $pro_titulo; ?>" />
               </tr>
               <tr>
                   <td align="right">Produto Categoria</td>
                   <td align="left">
                       <select name="produto_cat">
                           <option><?php echo $categoria_titulo; ?></option>
                           <?php
                               $get_cats = "SELECT * FROM categorias";
                               $run_cats = mysqli_query($data_base, $get_cats);

                               while($row_cats = mysqli_fetch_array(($run_cats))) {
                                   $cat_id = $row_cats['cat_id'];
                                   $cat_titulo = $row_cats['cat_titulo'];

                                   echo "<option value='$cat_id'>$cat_titulo</option>";
                               }
                           ?>
                       </select>
                   </td>
               </tr>
               <tr>
                   <td align="right">Produto Marca</td>
                   <td align="left">
                       <select name="produto_marca">
                       <option><?php echo $marca_titulo; ?></option>
                       <?php
                            $get_marcas = "SELECT * FROM marcas";
                            $run_marcas = mysqli_query($data_base, $get_marcas);

                            while($row_marcas = mysqli_fetch_array($run_marcas)) {
                                $marca_id = $row_marcas['marca_id'];
                                $marca_titulo = $row_marcas['marca_titulo'];

                                echo "<option value='$marca_id'>$marca_titulo</option>";
                            }
                       ?>
                       </select>                      
               </tr>

               <tr>
                   <td align="right">Produto Imagem: </td>
                   <td align="left"><input type="file" name="produto_imagem" /><img src="produto_imagens/<?php echo $pro_imagem; ?>" width="60" height="60" /> </td>
               </tr>
               <tr>
                   <td align="right">Produto Preço: </td>
                   <td align="left"><input type="text" name="produto_preco" value="<?php echo $pro_preco; ?>" />
               </tr>
               <tr>
                   <td align="right">Produto Descrição: </td>
                   <td><textarea name="produto_desc" cols="80" rows="10"><?php echo $pro_desc; ?></textarea></td>
               </tr>
               <tr>
                   <td align="right">Produto Palavra-Chave: </td>
                   <td align="left"><input type="text" name="produto_keywords" value="<?php echo $pro_keywords; ?>" /></td>
               </tr>
               <tr align="center">
                   <td colspan="8"><input type="submit" name="atualizar_produto" value="Atualizar"></td>
               </tr>
           </table>
        </form>
    </body>
</html>
<?php
   global $data_base;
   if (isset($_POST['atualizar_produto'])) {
       

    
       // obtendo dados de texto de feilds
       $atualizar_id = $pro_id;
       $produto_titulo = $_POST['produto_titulo'];
       $produto_cat = $_POST['produto_cat'];
       $produto_marca = $_POST['produto_marca'];
       $produto_preco = $_POST['produto_preco'];
       $produto_desc = $_POST['produto_desc'];
       $produto_keywords = $_POST['produto_keywords'];

       // obtendo imagem de feilds
       $produto_imagem = $_FILES['produto_imagem']['name'];
       $produto_imagem_tmp = $_FILES['produto_imagem']['tmp_name'];

       move_uploaded_file($produto_imagem_tmp, "produto)imagens/$produto_imagem");

       
       $query = "UPDATE produtos SET produto_cat = '$produto_cat', '$produto_marca', '$produto_titulo', '$produto_preco', '$produto_desc', '$produto_imagem', '$produto_keywords' WHERE produto_id = '$atualizar_id'";

       $run_atualiza = mysqli_query($data_base, $query) or die("Não pode trabalhar!");

       if ($run_atualiza) {
           # code...
           echo "<script>alert('O produto foi atualizado')</script>";
           echo "<script>window.open('index.php?exibir_produto', 'self')</script>";
       }
   }
?>
<?php } ?>