<?php
    require "../../autoload.php";

    $daoCliente   = new ClienteDAO();
    $daoQuarto    = new QuartoDAO();
    $daoPagamento = new PagamentoDAO();
    $daoServico   = new ServicoDAO();
    $servicos     = $daoServico->read();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?php include "../menu/header.php"?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <h1 class="h2">Cadastrar Reserva</h1>
          </div>

          <div class="table-responsive small">
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="data_reserva">Data da reserva</label>
                    <input type="date" name="data_reserva" id="data_reserva" value="<?= date('Y-m-d') ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_cliente">Cliente</label>
                    <select name="id_cliente" id="id_cliente" class="form-control">
                        <?php foreach($daoCliente->read() as $cliente) : ?>
                        <option  value="<?= $cliente->getIdcliente() ?>"><?= $cliente->getNome() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_quarto">Quarto</label>
                    <select name="id_quarto" id="id_quarto" class="form-control" onchange="calcularTotal()">
                        <?php foreach($daoQuarto->read() as $quarto) : ?>
                        <option  value="<?= $quarto->getIdquarto() ?>" data-preco="<?= $quarto->getPreco() ?>">
                            <?= $quarto->getNome() ?> - R$ <?= number_format($quarto->getPreco(), 2, ',', '.') ?>/hora
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantidade_horas">Quantidade de horas</label>
                    <input type="number" min="1" name="quantidade_horas" id="quantidade_horas" value="1" class="form-control" oninput="calcularTotal()" required>
                </div>
                <div class="form-group">
                    <label for="id_pagamento">Forma de pagamento</label>
                    <select name="id_pagamento" id="id_pagamento" class="form-control">
                        <?php foreach($daoPagamento->read() as $pagamento) : ?>
                        <option  value="<?= $pagamento->getIdpagamento() ?>"><?= $pagamento->getTipopagamento() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Serviços utilizados</label>
                    <table class="table table-sm align-middle">
                        <tr>
                            <th>Serviço</th>
                            <th>Preço</th>
                            <th style="width:120px">Quantidade</th>
                        </tr>
                        <?php foreach($servicos as $servico) : ?>
                        <tr>
                            <td><?= $servico->getTiposervico() ?></td>
                            <td>R$ <?= number_format($servico->getPreco(), 2, ',', '.') ?></td>
                            <td>
                                <input type="number" min="0"
                                       name="servicos[<?= $servico->getIdservico() ?>]"
                                       value="0"
                                       data-preco="<?= $servico->getPreco() ?>"
                                       class="form-control form-control-sm servico-qtd"
                                       oninput="calcularTotal()">
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>

                <div class="form-group">
                    <label for="valor_total">Valor total (quarto + serviços)</label>
                    <input type="text" id="valor_total" class="form-control" readonly>
                </div>
                <div class="form-group mt-3">
                    <input type="reset" value="Limpar" class="btn">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </div>
            </form>
          </div>
          <script>
            function calcularTotal() {
              const horas = parseInt(document.getElementById('quantidade_horas').value) || 0;
              const quarto = document.getElementById('id_quarto');
              const precoQuarto = parseFloat(quarto.options[quarto.selectedIndex].dataset.preco) || 0;

              let total = precoQuarto * horas;
              document.querySelectorAll('.servico-qtd').forEach(function (input) {
                total += (parseInt(input.value) || 0) * parseFloat(input.dataset.preco);
              });

              document.getElementById('valor_total').value =
                total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            }
            document.addEventListener('DOMContentLoaded', calcularTotal);
          </script>
        </main>
      </div>
    </div>
    <script
      src="../../js/bootstrap.bundle.min.js"
      class="astro-vvvwv3sm"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
      integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp"
      crossorigin="anonymous"
      class="astro-vvvwv3sm"
    ></script>
    <script src="../../js/dashboard.js" class="astro-vvvwv3sm"></script>
  </body>
</html>