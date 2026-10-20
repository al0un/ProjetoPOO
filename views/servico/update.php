<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (Bean)
    $servico = new Servico();

    //Definir os valores dos atributos a partir dos dados do form
    $servico->setTiposervico($_POST['tipo_servico']);
    $servico->setPreco($_POST['preco']);
    $servico->setIdservico($_POST['id']);

    // Instanciar um objeto da classe CLienteDao
    $dao = new ServicoDAO();

    // Invocar o método update da classe ClienteDao
    $dao->update($servico);

    // Redirecionar para o index
    header('location: index.php');
?>