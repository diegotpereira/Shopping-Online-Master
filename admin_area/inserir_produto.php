<!DOCTYPE html>
<?php
     include("includes/dataBase.php");
     if (!isset($_SESSION['usuario_email'])) {
         # code...
         echo "<script>window.open('login.php?not_admin = Você não é administrador !', '_self')</script>";
     }else {
         # code...
     
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
                   <td colspan="2" style="padding-top: 1opx;"><h2>Inserir Produtos</h2></td>
               </tr>
               <tr>
                   <td align="right">Produto titulo: </td>
                   <td align="left"><input type="text" name="produto_titulo" required /></td>
               </tr>
               <tr>
                   <td align="right">Produto Categoria</td>
                   <td align="left">
                       <select name="produto_cat">
                           <option>Seleciona a Categoria</option>
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
                       <option>Selecione a Marca</option>
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
                   <td align="left"><input type="file" name="produto_imagem" />
               </tr>
               <tr>
                   <td align="right">Produto Preço: </td>
                   <td align="left"><input type="text" name="produto_preco" required />
               </tr>
               <tr>
                   <td align="right">Produto Descrição: </td>
                   <td><textarea name="produto_desc" cols="80" rows="10"></textarea></td>
               </tr>
               <tr>
                   <td align="right">Produto Palavra-Chave: </td>
                   <td align="left"><input type="text" name="produto_keywords" required /></td>
               </tr>
               <tr align="center">
                   <td colspan="8"><input type="submit" name="inserir_produto" value="Inserir"></td>
               </tr>
           </table>
        </form>
    </body>
</html>
<?php
   global $data_base;
   if (isset($_POST['inserir_produto'])) {
       

    
       // obtendo dados de texto de feilds
       $produto_titulo = $_POST['produto_titulo'];
       $produto_cat = $_POST['produto_cat'];
       $produto_marca = $_POST['produto_marca'];
       $produto_preco = $_POST['produto_preco'];
       $produto_desc = $_POST['produto_desc'];
       $produto_keywords = $_POST['produto_keywords'];

       // obtendo imagem de feilds
       $produto_imagem = $_FILES['produto_imagem']['nome'];
       $produto_imagem_tmp = $_FILES['produto_imagem']['tmp_nome'];

       move_uploaded_file($produto_imagem_tmp, "produto)imagens/$produto_imagem");

       
       $query = "INSERT INTO produtos VALUES ('$produto_cat', '$produto_marca', '$produto_titulo', '$produto_preco', '$produto_desc', '$produto_imagem', '$produto_keywords', '')";

       $run_pro = mysqli_query($data_base, $query) or die("Não pode trabalhar!");

       echo "<script>alert('O produto foi inserido')</script>";
       echo "<script>window.open('index.php?inserir_produto', '_self')</script>";
   }
?>
<?php } ?>