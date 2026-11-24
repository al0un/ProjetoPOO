<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include "../menu/header.php"?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <h1 class="h2">Cadastrar Tipo de Pagamento</h1>
          </div>

          <div class="table-responsive small">
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="nome">Tipo de Pagamento</label>
                    <input type="text" name="tipo_pagamento" class="form-control">
                </div>
                <div class="form-group">
                    <input type="reset" value="Limpar" class="btn">
                    <input type="submit" value="Salvar" class="btn btn-success">
                </div>
            </form>
          </div>
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