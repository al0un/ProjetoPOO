<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (Bean)
    $pagamento = new Pagamento();

    //Definir os valores dos atributos a partir dos dados do form
    $pagamento->setTipopagamento($_POST['tipo_pagamento']);
    $pagamento->setIdpagamento($_POST['id']);

    // Instanciar um objeto da classe CLienteDao
    $dao = new PagamentoDAO();

    // Invocar o método update da classe ClienteDao
    $dao->update($pagamento);

    // Redirecionar para o index
    header('location: index.php');
?>