<?php
    require "Carro.php";
    require "Cliente.php";
    require "Quarto.php";
    require "Servico.php";
    require "Reserva.php";
?>


    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Reserva Motel</title>
    </head>
    <body>

        <h1>Fazer Reserva</h1>

        <form action="resumo.php" method="POST">

            <h3>Cliente</h3>

            Telefone:
            <input type="text" name="telefone" required>
            <br><br>

            <h3>Carro</h3>

            Placa:
            <input type="text" name="placa" required>
            <br><br>

            Modelo:
            <input type="text" name="modelo" required>
            <br><br>

            Cor:
            <input type="text" name="cor" required>
            <br><br>

            <h3>Reserva</h3>

            Dia:
            <input type="date" name="dia" required>
            <br><br>

            Horas:
            <input type="number" name="horas" min="1" required>
            <br><br>

            Quarto:
            <select name="quarto">

                <option value="luxo">
                    Suite Luxo - R$120/h
                </option>

                <option value="premium">
                    Suite Premium - R$200/h
                </option>

            </select>

            <br><br>

            <h3>Serviços</h3>

            <input type="checkbox" name="servicos[]" value="jantar">
            Jantar - R$80
            <br>

            <input type="checkbox" name="servicos[]" value="bebidas">
            Bebidas - R$50
            <br>

            <input type="checkbox" name="servicos[]" value="decoracao">
            Decoração Romântica - R$100
            <br>

            <input type="checkbox" name="servicos[]" value="massagem">
            Massagem - R$150
            <br><br>

            <hr>

            <h1>Escolha a forma de pagamento</h1>

            <br>
        
            <select name="pagamento">

                <option value="Debito">
                    Débito
                </option>

                <option value="Credito">
                    Credito
                </option>

                <option value="Pix">
                    Pix
                </option>

                <option value="Dinheiro">
                    Dinheiro
                </option>

            </select>

            <br><br><br>


            <button type="submit">
                Reservar
            </button>

        </form>
        
    </body>
    </html>