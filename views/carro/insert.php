<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe carro (bean)
    $carro = new Carro();

    //Definir os valores dos tributos a partir do form
    $carro->setModelo($_POST['modelo']);
    $carro->setPlaca($_POST['placa']);
    $carro->setCor($_POST['cor']);
    
    //Instanciar um objeto do cliente
    $cliente = new Cliente();
    $cliente->setIdcliente($_POST['id_cliente']);

    //Definir a categoria no carro
    $carro->setCliente($cliente);

    //Instanciar um objeto da classe carro (dao)

    $dao = new CarroDAO();

    // Invocar o método create
    $dao->create($carro);

    //Redirecionar para o index (comentar caso não funcione)
    header('location: index.php');
?>