<?php
    require "Dinheiro.php";

    $meuPagamento = new Dinheiro();

    $meuPagamento -> pagar();
    $meuPagamento -> troco();
?>