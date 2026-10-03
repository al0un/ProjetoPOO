<?php
    //Incluir o arquivo autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe quarto (bean)
    $quarto = new Quarto();

    //Definir os valores dos tributos a partir do form
    $quarto->setNome($_POST['nome']);
    $quarto->setDescricao($_POST['descricao']);
    $quarto->setSituacao($_POST['situacao']);
    $quarto->setPreco($_POST['preco']);

    //Instanciar um objeto da classe quarto (dao)

    $dao = new QuartoDAO();

    // Invocar o método create
    $dao->create($quarto);

    //Redirecionar para o index (comentar caso não funcione)
    header('location: index.php');
?>