<?php
    //INCLUIR O ARQUIVO PARA CARREGAMENTO DAS CLASSES
    require "../../autoload.php";

    //Instanciar um objeto da classe DAO
    $dao = new ServicoDAO
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include "../menu/header.php"?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <h1 class="h2">Serviços</h1>
            
          </div>

          <p>
            <a href="create.php">Novo Serviço</a>
          </p>
          
          <div class="table-responsive small">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tipo de Servico</th>
                    <th>Preco</th>
                    <th>Ações</th>
                </tr>
                <?php foreach($dao->read() as $servico) : ?>
                    <tr>
                        <td>    <?= $servico->getIdservico() ?>    </td>
                        <td>    <?= $servico->getTiposervico() ?>    </td>
                        <td>    <?= $servico->getPreco() ?>    </td>
                        <td>
                          <a title="Editar" href="edit.php?id=<?= $servico->getIdservico() ?>">
                            <i class="bi bi-pencil"></i>
                          </a>
                           <a class="link-danger" title="Excluir" href="destroy.php?id=<?= $servico->getIdservico() ?>">
                            <i class="bi bi-trash3"></i>
                          </a>
                        </td>
                    </tr> 
                <?php endforeach ?>
            </table>
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