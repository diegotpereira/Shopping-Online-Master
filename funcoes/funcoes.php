<?php
  $data_base = mysqli_connect("localhost", "root", "root", "db_shopping_online");
  
  function getProduto() {
      if (!isset($_GET['cat'])) {
          # code...
          if (!isset($_GET['marca'])) {
              # code...

              echo '<link rel="stylesheet" href="css/estilo.css" media="all" />';

              global $data_base;

              $getProduto = "SELECT * FROM produtos";

              $run_pro = mysqli_query($data_base, $run_pro);
          }
      }
  }
?>