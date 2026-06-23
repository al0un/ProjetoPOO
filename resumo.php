<?php

require "Carro.php";
require "Cliente.php";
require "Quarto.php";
require "Servico.php";
require "Reserva.php";

/* -------- CARRO -------- */

$carro = new Carro(
    $_POST["placa"],
    $_POST["modelo"],
    $_POST["cor"]
);

/* -------- CLIENTE -------- */

$cliente = new Cliente(
    $_POST["telefone"],
    $carro
);

/* -------- QUARTOS -------- */

$quartoLuxo = new Quarto(
    "Suite Luxo",
    "Quarto com hidromassagem",
    "Disponivel",
    120
);

$quartoPremium = new Quarto(
    "Suite Premium",
    "Quarto com piscina",
    "Disponivel",
    200
);

/* -------- ESCOLHER QUARTO -------- */

if($_POST["quarto"] == "luxo") {

    $quartoEscolhido = $quartoLuxo;

} else {

    $quartoEscolhido = $quartoPremium;
}

/* -------- RESERVA -------- */

$reserva = new Reserva();

$reserva->setCliente($cliente);
$reserva->setQuarto($quartoEscolhido);
$reserva->setDia($_POST["dia"]);
$reserva->setQuantidadeHoras($_POST["horas"]);

/* -------- SERVIÇOS -------- */

if(isset($_POST["servicos"])) {

    foreach($_POST["servicos"] as $servicoSelecionado) {

        switch($servicoSelecionado) {

            case "jantar":
                $servico = new Servico(80, "Jantar");
                break;

            case "bebidas":
                $servico = new Servico(50, "Bebidas");
                break;

            case "decoracao":
                $servico = new Servico(100, "Decoracao");
                break;

            case "massagem":
                $servico = new Servico(150, "Massagem");
                break;
        }

        $reserva->adicionarServico($servico);
    }
}

$totalQuarto =
    $quartoEscolhido->getPrecoQuarto()
    * $_POST["horas"];

$totalReserva = $reserva->calcularPrecoReserva();

?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Resumo da Reserva</title>
    </head>
    <body>

        <h1>Resumo da Reserva</h1>

        <h3>Cliente</h3>

        <p>
            <strong>Telefone:</strong>
            <?= $cliente->getTelefone(); ?>
        </p>

        <h3>Carro</h3>

        <p>
            <strong>Placa:</strong>
            <?= $carro->getPlaca(); ?>
        </p>

        <p>
            <strong>Modelo:</strong>
            <?= $carro->getModelo(); ?>
        </p>

        <p>
            <strong>Cor:</strong>
            <?= $carro->getCor(); ?>
        </p>

        <h3>Reserva</h3>

        <p>
            <strong>Dia:</strong>
            <?= $reserva->getDia(); ?>
        </p>

        <p>
            <strong>Quarto:</strong>
            <?= $quartoEscolhido->getNomeQuarto(); ?>
        </p>

        <p>
            <strong>Horas:</strong>
            <?= $_POST["horas"]; ?>
        </p>

        <p>
            <strong>Total do quarto:</strong>
            R$ <?= $totalQuarto; ?>
        </p>

        <h3>Serviços</h3>

        <?php

            if(isset($_POST["servicos"])) {

                foreach($reserva->getServicos() as $servico) {

                    echo "<p>";
                    echo $servico->getTipoServico();
                    echo " - R$ " . $servico->getPreco();
                    echo "</p>";
                }

            } else {

                echo "<p>Nenhum serviço selecionado</p>";
            }

        ?>

        <h2>
            Total da Reserva:
            R$ <?= $totalReserva; ?>
        </h2>

        <hr>

        <h1>Escolha a forma de pagamento</h1>

            <a href="pagamentoDebito.php">
                <button>
                    Débito
                </button>
            </a>

            <br><br>
        
            <a href="pagamentoCredito.php">
                <button>
                    Crédito
                </button>
            </a>

            <br><br>

            <a href="pagamentoDinheiro.php">
                <button>
                    Dinheiro
                </button>
            </a>

            <br><br>

            <a href="pagamentoPix.php">
                <button>
                    Pix
                </button>
            </a>

        <br><br><br>



    </body>
</html>