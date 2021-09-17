<?php
  $data_base = mysqli_connect("localhost", "root", "root", "db_shopping_online");

  function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        # code...
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        # code...
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
  }
  
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

                  echo 
                        "<div id='unico_produto'>
                            <h3>$pro_titulo</h3>
                            <img src='admin_area/produto_imagens/$pro_imagem' width='180' height='180' />
                            <p> R$ <br>$pro_preco</b></p>
                            <a href='detalhes.php?pro_id=$pro_id' style='float:left'>Detalhes</a>
                            <a href='index.php?add_carrinho=$pro_id'><button style='float:right'>Adicionar no Carrinho</button></a>
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
                            <a href='detalhes.php?pro_id=$pro_id' style='float:left'>Detalhes</a>
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
                            <a href='detalhes.php?pro_id=$pro_id' style='float:left'>Detalhes</a>
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
                        <a href='detalhes.php?pro_id=$pro_id' style='float:left'>Detalhes</a>
                        <a href='index.php?pro_id = $pro_id'><button style='float:right'>Adicionar ao Carrinho</button></a>
                      </div> ";
            }
        }
        
    }
  }

  function precoTotal() {
      $total = 0;
      global $data_base;
      $ip = getIp();
      $selecionaPreco = "SELECT * FROM carrinho WHERE ip_add = '$ip'";
      $run_preco = mysqli_query($data_base, $selecionaPreco);

      while($p_preco = mysqli_fetch_array($run_preco)) {
          $pro_id = $p_preco['p_id'];
          $pro_preco = "SELECT * FROM produtos WHERE produto_id = '$pro_id'";
          $run_pro_preco = mysqli_query($data_base, $pro_preco);

          while($pp_preco = mysqli_fetch_array($run_pro_preco)) {
              $produto_preco = array($pp_preco['produto_preco']);
              $values = array_sum($produto_preco);
              $total += $values;
          }
      }

      echo "R$ $total";
  }

  function carrinho() {
      global $data_base;

      if (isset($_GET['add_carrinho'])) {
          # code...
          $ip = getIp();
          $pro_id = $_GET['add_carrinho'];

          $check_pro = "SELECT * FROM carrinho WHERE ip_add = '$ip' AND p_id = '$pro_id'";
          $run_check = mysqli_query($data_base, $check_pro) or die('error');
          $test = mysqli_num_rows($run_check);

          if ($test > 0) {
              # code...
              echo "<script>window.alert('O produto já foi adicionado uma vez ..!')</script>";
              echo "<script>window.open('index.php', 'self')</script>";
          }else {
              $inserir_pro = "INSERT INTO carrinho (p_id, qtd, ip_add) VALUES ('$pro_id', '1', '$ip')";
              $run_pro = mysqli_query($data_base, $inserir_pro);

              echo "<script>window.open('index.php', 'self')</script>";
          }
      }
  }

  function total_itens() {
      global $data_base;

      $ip = getIp();

      if (isset($_GET['add_carrinho'])) {
          # code...

          $get_itens = "SELECT * FROM carrinho WHERE ip_add = '$ip'";
          $run_itens = mysqli_query($data_base, $get_itens);
          $count_itens = mysqli_num_rows($run_itens);

      } else {
          # code...
          $get_itens = "SELECT * FROM carrinho WHERE ip_add = '$ip'";
          $runs_itens = mysqli_query($data_base, $get_itens);
          $count_itens = mysqli_num_rows($runs_itens);
      }
      echo $count_itens;
  }
?>