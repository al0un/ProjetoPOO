<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe servico (bean)
    $servico = new Servico();

    //Definir os valores dos tributos a partir do form
    $servico->setTiposervico($_POST['tipo_servico']);
    $servico->setPreco($_POST['preco']);

    //Instanciar um objeto da classe servico (dao)

    $dao = new ServicoDAO();

    // Invocar o método create
    $dao->create($servico);

    //Redirecionar para o index (comentar caso não funcione)
    header('location: index.php');
?>