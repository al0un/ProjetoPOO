<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe quarto (bean)
    $formaPagamento = new FormaPagamento();

    //Definir os valores dos tributos a partir do form
    $formaPagamento->setTipoPagamento($_POST['tipoPagamento']);

    //Instanciar um objeto da classe quarto (dao)

    $dao = new FormaPagamentoDAO();

    // Invocar o método create
    $dao->create($formaPagamento);

    //Redirecionar para o index (comentar caso não funcione)
    header('location: index.php');
?>