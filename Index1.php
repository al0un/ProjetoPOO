<?php
    require "quartos.php";
    require "clientes.php";

    $meuQuarto = new Quarto ("Gamer1", "1 cama, RGB, Plugs com led, vibradores que tocam musica, Ps5.", "vazio", "350");
    $meuCliente = new Cliente ("4002 8922");

    $meuQuarto -> imprimirQuarto();
    $meuCliente -> imprimirCliente();
?>