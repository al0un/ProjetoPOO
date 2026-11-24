<?php
    /**
     * @param Quarto $quarto     objeto Quarto já carregado (QuartoDAO->find)
     * @param int    $horas      quantidade de horas
     * @param array  $servicos   [id_servico => quantidade] vindo do form
     */
    function calcularTotalReserva($quarto, $horas, $servicos) {
        $total = $quarto->getPreco() * $horas;

        $daoServico = new ServicoDAO();
        foreach ($servicos as $idServico => $quantidade) {
            $quantidade = (int) $quantidade;
            if ($quantidade <= 0) continue;

            $servico = $daoServico->find($idServico);
            $total  += $servico->getPreco() * $quantidade;
        }
        return $total;
    }
?>