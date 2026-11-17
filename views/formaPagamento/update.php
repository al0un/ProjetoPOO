<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (Bean)
    $formaPagamento = new FormaPagamento();

    //Definir os valores dos atributos a partir dos dados do form
    $formaPagamento->setTipoPagamento($_POST['tipoPagamento']);
    // Instanciar um objeto da classe CLienteDao
    $dao = new FormaPagamentoDAO();

    // Invocar o método update da classe ClienteDao
    $dao->update($formaPagamento);

    // Redirecionar para o index
    header('location: index.php');
?>