<?php
    require "../../autoload.php";

    $id = $_GET['id'];

    // Primeiro os itens (FK reserva_servico -> reserva), depois a reserva
    $daoRS = new ReservaServicoDAO();
    $daoRS->destroyByReserva($id);

    $dao = new ReservaDAO();
    $dao->destroy($id);

    header('location: index.php');
?>