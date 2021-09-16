<div>
    <?php
        include("includes/dataBase.php");

        $total = 0;
        global $data_base;
        $ip = getIp();
        $selecionar_preco = "SELECT * FROM carrinho WHERE ip_add = '$ip'";
        $run_preco = mysqli_query($data_base, $selecionar_preco);

        while($p_preco = mysqli_fetch_array($run_preco)) {
            $pro_id = $p_preco['p_id'];
            $pro_preco = "SELECT * FROM produtos WHERE produto_id = '$pro_id'";
            $run_pro_preco = mysqli_query($data_base, $pro_preco);

            while($pp_preco = mysqli_fetch_array($run_pro_preco)) {
                $produto_preco = array($pp_preco['produto_preco']);
                $produto_nome = $pp_preco['produto_preco'];
                $values = array_sum($produto_preco);
                $total += $values;
            }
        }
    ?>

    <br>
    <h2 align="center">Pagar com Paypal</h2>
    <p style="text-align: center;"><img src="paypal.jpg" width="200" height="100" /></p>
    <br>

    <!-- Identifique o seu negócio para poder receber os pagamentos. -->
    <input type="hidden" name="business" value="...@email.com" >

    <!-- especificar um botão comprar agora -->
    <input type="hidden" name="cmd" value="_xclick" >

    <!-- especifique detalhes sobre o item que os compradores irão comprar -->
    <input type="hidden" name="item_nome" value="<?php echo "$produto_nome"; ?>">
    <input type="hidden" name="quantia" value="<?php echo "$total"; ?>">
    <input type="hidden" name="codigo_moeda" value="brl">

    <input type="hidden" name="retornar" value="paypal_sucesso.php">
    <input type="hidden" name="cancelar_retorno" value="paypal_cancelar.php">

    
    <!-- Exibir o botão de pagamento -->
    <input type="image" name="submit" border="0" src="paypal" alt="Paypal - A maneira mais segura e fácil de pagar online" width="195" height="110">

    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_us/i/scr/pixel.gif" >

    </form>
</div>