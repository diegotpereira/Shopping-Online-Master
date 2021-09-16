<?php
    session_start();
    session_destroy();

    echo "<script>window.opn('../index.php', '_sel')</script>";
?>