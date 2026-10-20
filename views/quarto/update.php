<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (Bean)
    $quarto = new Quarto();

    //Definir os valores dos atributos a partir dos dados do form
    $quarto->setNome($_POST['nome']);
    $quarto->setDescricao($_POST['descricao']);
    $quarto->setSituacao($_POST['situacao']);
    $quarto->setPreco($_POST['preco']);
    $quarto->setIdquarto($_POST['id']);

    // Instanciar um objeto da classe CLienteDao
    $dao = new QuartoDAO();

    // Invocar o método update da classe ClienteDao
    $dao->update($quarto);

    // Redirecionar para o index
    //header('location: index.php');
?>