<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe Cliente (bean)
    $cliente = new Cliente();

    //Definir os valores dos tributos a partir do form
    $cliente->setNome($_POST['nome']);
    $cliente->setTelefone($_POST['telefone']);

    //Instanciar um objeto da classe cliente (dao)

    $dao = new ClienteDAO();

    // Invocar o método create
    $dao->create($cliente);

    //Redirecionar para o index (comentar caso não funcione)
    header('location: index.php');
?>