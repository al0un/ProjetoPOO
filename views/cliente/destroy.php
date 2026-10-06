<?php
    require "../../autoload.php";

    //Coletar o valor do id pela URL
    $id = $_GET['id'];

    // Instanciar objeto da classe ClienteDao
    $dao = new ClienteDAO();

    //Instanciar o método excluir
    $dao->destroy($id);

    //Redirecionar para o index
    header('location: index.php');
?>