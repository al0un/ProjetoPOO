<?php
    require "CartaoCredito.php";

    $meuPagamento = new CartaoCredito();

    $meuPagamento -> pagar();
    $meuPagamento -> parcelar();
?>