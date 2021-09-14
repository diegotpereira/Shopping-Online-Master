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

              while($row_pro = mysqli_fetch_array($run_pro)) {
                  $pro_id = $row_pro['produto_id'];
                  $pro_cat = $row_pro['produto_cat'];
                  $pro_marca = $row_pro['produto_marca'];
                  $pro_titulo = $row_pro['produto_titulo'];
                  $pro_preco = $row_pro['produto_preco'];
                  $pro_imagem = $row_pro[5];

                  echo "<div id='unico_produto'>
                            <h3>$pro_titulo</h3>
                            <img src='admin_area/produto_imagens/$pro_imagem' width='180' height='180' />
                            <p> R$ <br>$pro_preco</b></p>
                            <a href='detalhes.php?pro_id = $pro_id' style='float:left'>Detalhes</a>
                            <a href='index.php?add_carrinho =$pro_id'><button style='float:right'>Adicionaro ao Carrinho</button></a>
                        </div>";
              }
          }
      }
  }

  function getCategorias() {
      global $data_base;

      $get_cats = "SELECT * FROM categorias";

      $run_cats = mysqli_query($data_base, $get_cats);

      while($row_cats = mysqli_fetch_array($run_cats)) {
          $cat_id = $row_cats['cat_id'];
          $cat_titulo = $row_cats['cat_titulo'];

          echo "<li><a href='index.php?cat=$cat_id'>$cat_titulo</a></li>";
      }
  }

  function getMarcas() {

    global $data_base;
    $get_marcas = "SELECT * FROM marcas";

    $run_marcas = mysqli_query($data_base, $get_marcas);

    while($row_marcas = mysqli_fetch_array($run_marcas)) {
        $marca_id = $row_marcas['marca_id'];
        $marca_titulo = $row_marcas['marca_titulo'];

        echo "<li><a href='index.php?marca=$marca_id'>$marca_titulo</a></li>";
    }
  }

  function getMarcaProd() {
      if (isset($_GET['marca'])) {
          # code...
          $marca_id = $_GET['marca'];

          echo '<link rel="stylesheet" href="css/estilo.css" media="all" />';

          global $data_base;

          $get_marca_pro = "SELECT * FROM produtos WHERE produto_marca = '$marca_id'";

          $run_marca_pro = mysqli_query($data_base, $get_marca_pro);

          $count_marca = mysqli_num_rows($run_marca_pro);

          if ($count_marca == 0) {
              # code...
              echo "<h2>Desculpe !</h2><h3> Nenhum produto disponível para esta marca.</h3>";
              exit();
          }else{

            while($row_marca_pro = mysqli_fetch_array($run_marca_pro)) {
                $pro_id = $row_marca_pro['produto_id'];
                $pro_cat = $row_marca_pro['produto_cat'];
                $pro_marca = $row_marca_pro['produto_marca'];
                $pro_titulo = $row_marca_pro['produto_titulo'];
                $pro_preco = $row_marca_pro['produto_preco'];
                $pro_imagem = $row_marca_pro[5];

                echo "<div id='unico_produto'>
                      <h3>$pro_titulo</h3>
                      <img src='admin_area/produto_imagens/$pro_imagem' width='180' height='180' />
                      <p> R$ <b>$pro_preco</b></p> 
                      <a href='detalhes.php?pro_id = $pro_id' style='float:left'>Detalhes</a>
                      <a href='index.php?pro_id = $pro_id'><button style='float:right'>Adicionar ao Carrinho</button></a>
                      </div>";
            }
          }
      }
  }

  function getCategoriaPro() {
      if (isset($_GET['cat'])) {
          # code...
          $cat_id = $_GET['cat'];

          echo '<link rel="stylesheet" href="css/estilo.css" media="all" /> ';

          global $data_base;

          $get_cat_pro = "SELECT * FROM produtos WHERE produto_cat = '$cat_id'";

          $run_cat_pro = mysqli_query($data_base, $get_cat_pro);

          $count_cats = mysqli_num_rows($run_cat_pro);

          if ($count_cats == 0) {
              # code...
              echo "<h2>Desculpe !</h2><h3> Nenhum produto disponível para esta categoria</h3>";
              exit();
          } else {
              # code...
              while($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
                  $pro_id = $row_cat_pro['produto_id'];
                  $pro_cat = $row_cat_pro['produto_cat'];
                  $pro_marca = $row_cat_pro['produto_marca'];
                  $pro_titulo = $row_cat_pro['produto_titulo'];
                  $pro_preco = $row_cat_pro['produto_preco'];
                  $pro_imagem = $row_cat_pro[5];

                  echo "<div id='unico_produto'>
                        <h3>$pro_titulo</h3> 
                        <img src='admin_area/produto_imagens/$pro_imagem' width='180' height='180' />
                        <p> R$ <b>$pro_preco</b></p>
                        <a href='detalhes.php?pro_id = $pro_id' style='float:left'>Detalhes</a>
                        <a href='index.php?pro_id = $pro_id'><button style='float:right'>Adicionar ao Carrinho</button></a>
                        </div> ";
              }
          }
          
      }
  }

  function getMarcaPro() {
    if (isset($_GET['marca'])) {
        # code...
        $marca_id = $_GET['marca'];

        echo '<link rel="stylesheet" href="css/estilo.css" media="all" /> ';

        global $data_base;

        $get_marca_pro = "SELECT * FROM produtos WHERE produto_marca = '$marca_id'";

        $run_marca_pro = mysqli_query($data_base, $get_marca_pro);

        $count_marca = mysqli_num_rows($run_marca_pro);

        if ($count_marca == 0) {
            # code...
            echo "<h2>Desculpe !</h2><h3> Nenhum produto disponível para esta marca</h3>";
            exit();
        } else {
            # code...
            while($row_marca_pro = mysqli_fetch_array($run_marca_pro)) {
                $pro_id = $row_marca_pro['produto_id'];
                $pro_cat = $row_marca_pro['produto_cat'];
                $pro_marca = $row_marca_pro['produto_marca'];
                $pro_titulo = $row_marca_pro['produto_titulo'];
                $pro_preco = $row_marca_pro['produto_preco'];
                $pro_imagem = $row_marca_pro[5];

                echo "<div id='unico_produto'>
                      <h3>$pro_titulo</h3> 
                      <img src='admin_area/produto_imagens/$pro_imagem' width='180' height='180' />
                      <p> R$ <b>$pro_preco</b></p>
                      <a href='detalhes.php?pro_id = $pro_id' style='float:left'>Detalhes</a>
                      <a href='index.php?pro_id = $pro_id'><button style='float:right'>Adicionar ao Carrinho</button></a>
                      </div> ";
            }
        }
        
    }
  }
?>