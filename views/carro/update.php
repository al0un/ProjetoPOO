<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Carro (Bean)
    $carro = new Carro();
    $cliente = new Cliente();

    //Definir os valores dos atributos a partir dos dados do form
    $carro->setModelo($_POST['modelo']);
    $carro->setPlaca($_POST['placa']);
    $carro->setCor($_POST['cor']);

    $cliente->setIdCliente($_POST['id_cliente']);
    $carro->setCliente($cliente);

    $carro->setIdCarro($_POST['id_quarto']);

    // Instanciar um objeto da classe CarroDao
    $dao = new CarroDAO();

    // Invocar o método update da classe CarroDao
    $dao->update($carro);

    // Redirecionar para o index
    header('location: index.php');
?>