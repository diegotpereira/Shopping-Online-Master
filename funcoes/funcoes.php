<?php
  $data_base = mysqli_connect("localhost", "root", "root", "db_shopping_online");
  
  function getProduto() {
      if (!isset($_GET['cat'])) {
          # code...
          if (!isset($_GET['marca'])) {
              # code...

              echo '<link rel="stylesheet" href="css/estilo.css" media="all" />';

              global $data_base;

              $get_pro = "SELECT * FROM produtos";

              $run_pro = mysqli_query($data_base, $get_pro);

              while($row_pro = mysqli_fetch_assoc($run_pro)) {
                  $pro_id = $row_pro['produto_id'];
                  $pro_cat = $row_pro['produto_cat'];
                  $pro_marca = $row_pro['produto_marca'];
                  $pro_titulo = $row_pro['produto_titulo'];
                  $pro_preco = $row_pro['produto_preco'];
                  $pro_imagem = $row_pro[5];

                  echo "<div id='unico_produto'>
                            <h3>$pro_titulo</h3>
                            <img src='admin_area/produto_imagens/$pro_imagem' width='180' />
                            <p> $#8377 <br>$pro_preco</b></p>
                            <a href='detalhes.php?pro_id = $pro_id' style='float:left'>Detalhes</a>
                            <a href='index.php?add_carrinho =$pro_id'><button style='float:right'>Adicionaro ao Carrinho</button></a>
                        </div>";
              }
          }
      }
  }
?>