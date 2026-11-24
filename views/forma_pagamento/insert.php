<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe pagamento (bean)
    $pagamento = new Pagamento();

    //Definir os valores dos tributos a partir do form
    $pagamento->setTipopagamento($_POST['tipo_pagamento']);

    //Instanciar um objeto da classe pagamento (dao)

    $dao = new PagamentoDAO();

    // Invocar o método create
    $dao->create($pagamento);

    //Redirecionar para o index (comentar caso não funcione)
    header('location: index.php');
?>