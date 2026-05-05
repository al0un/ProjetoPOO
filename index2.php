<?php
    require "servicos.php";
    require "carros.php";

    $teste1 = new carros("BRA8L89", "Corolla", "Preto");
    $teste2 = new servicos(10, "Coca 2L");

    echo"<h2>Teste</h2>";

    echo"<h2>Carro</h2>";
    $teste1 -> imprimirCarro();
    echo"<h2>Servico</h2>";
    $teste2 -> imprimirServico();

    


?>