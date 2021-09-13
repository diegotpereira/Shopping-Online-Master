<?php 
  $data_base = mysqli_connect("localhost", "root", "root", "db_shopping_online");

  echo "Conexão com Sucesso!";

  if (mysqli_connect_errno()) {
    # code...
    echo "Falha ao conectar no servidor :" .mysqli_connect_error();
  }

  ?>