<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (Bean)
    $cliente = new Cliente();

    //Definir os valores dos atributos a partir dos dados do form
    $cliente->setNome($_POST['nome']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setIdcliente($_POST['id']);

    // Instanciar um objeto da classe CLienteDao
    $dao = new ClienteDAO();

    // Invocar o método update da classe ClienteDao
    $dao->update($cliente);

    // Redirecionar para o index
    header('location: index.php');
?>