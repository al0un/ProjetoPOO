<?php
    require "../../autoload.php";
    require "calcular_total.php";

    $reserva = new Reserva();
    $reserva->setDatareserva($_POST['data_reserva']);
    $reserva->setQuantidadehoras($_POST['quantidade_horas']);

    $cliente = new Cliente();
    $cliente->setIdcliente($_POST['id_cliente']);
    $reserva->setCliente($cliente);

    $quarto = (new QuartoDAO())->find($_POST['id_quarto']);
    $reserva->setQuarto($quarto);

    $pagamento = new Pagamento();
    $pagamento->setIdpagamento($_POST['id_pagamento']);
    $reserva->setPagamento($pagamento);

    // [id_servico => quantidade]
    $servicos = $_POST['servicos'] ?? [];

    // Total calculado no servidor
    $reserva->setValortotal(
        calcularTotalReserva($quarto, (int) $_POST['quantidade_horas'], $servicos)
    );

    $dao = new ReservaDAO();
    $idReserva = $dao->create($reserva);   // create() precisa retornar o lastInsertId

    // Gravar os serviços utilizados
    $daoRS = new ReservaServicoDAO();
    foreach ($servicos as $idServico => $quantidade) {
        if ((int) $quantidade > 0) {
            $daoRS->create($idReserva, $idServico, (int) $quantidade);
        }
    }

    header('location: index.php');
?>